<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume Analysis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
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
            background-image: radial-gradient(circle at top left, #1c1c2c, #0f111a);
        }

        .container {
            background-color: #1a1d2d;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            width: 90%;
            max-width: 850px;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
            color: #00ffaa;
            letter-spacing: 1px;
        }

        .analysis-content {
            background-color: #111320;
            padding: 25px;
            border-radius: 10px;
            line-height: 1.8;
            font-size: 15px;
            overflow-y: auto;
            max-height: 60vh;
        }

        .analysis-content h3 {
            font-size: 20px;
            color: #00ffaa;
            margin-top: 20px;
        }

        .analysis-content ul {
            padding-left: 20px;
            margin-top: 10px;
        }

        .analysis-content li {
            margin-bottom: 8px;
        }

        .analysis-content p {
            margin-bottom: 12px;
        }

        .analysis-content strong {
            color: #ffffff;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            background-color: #00ffaa;
            color: #000;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #00ddaa;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 24px;
            }

            .analysis-content {
                font-size: 14px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>AI Resume Feedback</h1>

        <div class="analysis-content">
            {!! $analysis !!}
        </div>

        <div style="text-align: center;">
            <a href="{{ route('resume.form') }}" class="back-link">Upload Another Resume</a>
        </div>
    </div>
</body>
</html>
