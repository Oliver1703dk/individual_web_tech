<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes rollText {
            0% { transform: translateX(-50vw); }
            50% { transform: translateX(50vw); }
            100% { transform: translateX(-50vw); }
        }
        .rolling-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            white-space: nowrap;
            animation: rollText 10s linear infinite;
        }
        body {
            margin: 0;
            overflow-x: hidden; /* Hide horizontal overflow */
        }
    </style>
</head>
<body class="bg-gray-100">
<h1 class="text-5xl font-bold text-gray-800 rolling-text">This is an API</h1>
</body>
</html>
