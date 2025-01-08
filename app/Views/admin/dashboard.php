<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px;
            border: none;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <div>
            <a href="/materials" class="btn">Go to Materials</a>
            <a href="/materials/create" class="btn">Upload Material</a>
            <a href="/logout">Logout</a>
        </div>
    </div>
</body>
</html>
