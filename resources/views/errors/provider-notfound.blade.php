<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahifa Topilmadi</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .not-found-card {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
        }
        .not-found-card h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #dc3545;
        }
        .not-found-card p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }
        .not-found-card a {
            padding: 10px 25px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .not-found-card a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="not-found-card">
        <h1>404</h1>
        <p>Provider topilmadi.</p>
        <p>Kechirasiz, qidirayotgan Provider mavjud emas.</p>
        <a href="/">Bosh sahifaga qaytish</a>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
