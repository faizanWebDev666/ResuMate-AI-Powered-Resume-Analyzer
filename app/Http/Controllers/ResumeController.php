<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use League\CommonMark\CommonMarkConverter;
class ResumeController extends Controller
{
    public function index()
    {
        return view('Resume-upload');
    }
public function analyze(Request $request)
{
    $request->validate([
        'resume' => 'required|mimes:pdf|max:2048',
    ]);

    $path = $request->file('resume')->store('resumes');
    $fullPath = Storage::path($path);

    if (!file_exists($fullPath)) {
        return back()->with('error', 'File not found after upload. Please try again.');
    }

    // Parse PDF content
    $parser = new Parser();
    $pdf = $parser->parseFile($fullPath);
    $text = $pdf->getText();

    // Send content to OpenRouter API
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
        'HTTP-Referer' => 'http://localhost',
        'X-Title' => 'AI Resume Analyzer'
    ])->post('https://openrouter.ai/api/v1/chat/completions', [
        'model' => 'openai/gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => 'You are a professional resume analyzer.'],
            ['role' => 'user', 'content' => "Analyze the following resume and suggest improvements, point out missing skills, and recommend job roles:\n\n" . $text],
        ],
    ]);

    // Get and process AI response
    $data = $response->json();

    if (isset($data['choices'][0]['message']['content'])) {
        $markdown = $data['choices'][0]['message']['content'];

        // Convert markdown to HTML
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $analysis = $converter->convert($markdown)->getContent();

    } elseif (isset($data['error']['message'])) {
        $analysis = "<p style='color: red;'>Error from AI: " . e($data['error']['message']) . "</p>";
    } else {
        $analysis = "<p>No response from AI.</p>";
    }

    return view('result', ['analysis' => $analysis]);
}

}
