<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Resume Analyzer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background-color: #0f111a;
            color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: radial-gradient(circle at top left, #1f2235, #0f111a);
        }

        .upload-box {
            background-color: #1b1e2b;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 550px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .upload-box:hover {
            transform: translateY(-2px);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #00ffaa;
            font-weight: 600;
            letter-spacing: 1px;
        }

        input[type="file"] {
            background-color: #2e3046;
            color: #bbb;
            border: 1px solid #44475a;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="file"]:hover {
            background-color: #353855;
            border-color: #00ffaa;
        }

        input[type="file"]::file-selector-button {
            background-color: #00ffaa;
            color: #000;
            border: none;
            padding: 8px 14px;
            margin-right: 12px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #00ddaa;
        }

        button {
            margin-top: 25px;
            background-color: #00ffaa;
            color: #0f0f0f;
            padding: 12px 28px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00e699;
        }

        @media screen and (max-width: 600px) {
            .upload-box {
                padding: 30px 20px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="upload-box">
        <h1>Upload Your Resume (PDF)</h1>
        <form action="{{ route('resume.analyze') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="resume" accept="application/pdf" required>
            <br>
            <button type="submit">Analyze</button>
        </form>
    </div>
</body>
</html>
