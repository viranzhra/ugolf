<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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

        .payment-container {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code {
            width: 150px;
            height: 150px;
            margin: 20px 0;
        }

        .payment-amount {
            font-size: 1.5rem;
            color: #000;
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
            <b class="payment-amount" id="display-total-pembayaran">-</b>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve the total payment amount from localStorage
            const totalPembayaran = localStorage.getItem('totalPembayaran');

            // Check if totalPembayaran exists and display it
            if (totalPembayaran) {
                document.getElementById('display-total-pembayaran').textContent = 'Rp ' + totalPembayaran;
            } else {
                document.getElementById('display-total-pembayaran').textContent = 'Data tidak tersedia';
            }
        });
    </script>
</body>

</html>
