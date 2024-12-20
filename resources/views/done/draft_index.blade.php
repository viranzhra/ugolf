<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesai</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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

    <div class="">
        <p style="margin-top: 50px;font-weight:700">Terima Kasih Telah Melakukan Pembelian Tiket</p>
        <div class="payment-details">
            <p>Jumlah Tiket: {{ $qty }}</p>
            <p>Harga per Tiket: Rp {{ number_format($amount, 0, ',', '.') }}</p>
            <p>Total Pembayaran: Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
            <p>Tanggal Pembayaran: {{ $paymentDate }}</p>
        </div>
    </div>       

</body>

</html>
