<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurel Library</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            cursor: pointer;
        }
        h1 {
            font-size: 3rem;
            color: #5a67d8;
        }
    </style>
</head>
<body onclick="redirectToLogin()">
    <h1>Welcome to Aurel Library</h1>
    <script>
        function redirectToLogin() {
            window.location.href = "/login";
        }
    </script>
</body>
</html>
