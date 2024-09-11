<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Ma'lumotlari</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .provider-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .provider-logo {
            max-width: 150px;
            margin-bottom: 20px;
            border-radius: 50%;
            border: 2px solid #007bff;
        }
        .provider-details {
            text-align: left;
            margin-top: 20px;
        }
        .provider-details h3 {
            font-size: 28px;
            color: #333;
        }
        .provider-details p {
            font-size: 16px;
            color: #555;
        }
        .provider-button {
            margin-top: 30px;
        }
        .provider-button a {
            padding: 10px 25px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .provider-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="provider-card">
    <!-- Provider Logotipi -->
    <img src="{{ asset('storage/' . $provider->logo) }}" alt="Provider Logo" class="provider-logo">

    <!-- Provider Tafsilotlari -->
    <div class="provider-details">
        <h3>{{ $provider->name }}</h3>
        <p><strong>Manzil:</strong> {{ $provider->address }}</p>
        <p><strong>Aloqa:</strong> {{ $provider->phone }}</p>
        <p><strong>Email:</strong> {{ $provider->email }}</p>
        <p><strong>Izoh:</strong> {{ $provider->description }}</p>
    </div>
    
    <div class="additional-info">
        <p>Hurmatli {{ $email }},</p>
        <p>Sizga qo'shilish taklifi yuborildi. Quyidagi havolani bosish orqali tizimga kirishingiz mumkin:</p>
        <a href="{{ $invitationLink }}" style="color: blue;">Qo'shilish havolasi</a>
    </div>
    
    <div class="footer">
        <p>Agar biron-bir savolingiz bo'lsa, biz bilan bog'laning:</p>
        <p>Telefon: {{ $provider->phone }}</p>
        <p>Email: {{ $provider->email }}</p>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
