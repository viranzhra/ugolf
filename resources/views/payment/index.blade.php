<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ugorf</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: "Kufam", sans-serif;
            background-color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            position: relative;
        }
    </style>
    
</head>

<body>
    <!-- Bagian Judul (Navbar) -->
    <div class="judul">
        PEMBAYARAN
    </div>

    <div class="payment-container">
        <p class="payment-instruction">Scan QR untuk melakukan pembayaran</p>
        <img src="image/QR Code.svg" alt="QR Code" class="qr-code">
        <div class="payment-section">
            <p class="payment-label">Jumlah Pembayaran</p>
            <b class="payment-amount">Rp 100.000</b>
        </div>
    </div>       

</body>

</html>
