<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">

    <style>
        /* Prevent scrolling */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        /* General styling */
        body {
            font-family: 'Kufam', sans-serif;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            text-align: center;
        }

        /* Title styling */
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #8F3581;
            margin-top: 20px;
            letter-spacing: 2px;
        }

        .message {
            font-size: 18px;
            margin-top: 10px;
            color: #333;
        }

        /* SVG Icon Styling */
        .icon {
            width: 120px;
            height: 120px;
            margin-top: 30px;
            opacity: 0;
            transform: scale(0.5);
            animation: fadeInScale 1s ease-in-out forwards;
        }

        /* Gradient for success checkmark */
        .checkmark {
            fill: url(#gradient);
        }

        /* Fill color for error icon */
        .error-icon {
            fill: #bf661d;
        }

        /* Animation for icons */
        @keyframes fadeInScale {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Button styling */
        .button {
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #8F3581;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #6d285f;
        }
    </style>
</head>

<body>

    <div class="judul" style="position: absolute;top:0">
        PEMBAYARAN
    </div>

    <!-- SVG Icons for Success and Error -->
    <!-- Success Checkmark -->
    <svg id="successIcon" class="icon checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" style="display: none;">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#FFD700" /> <!-- Yellow -->
                <stop offset="100%" stop-color="#FF8C00" /> <!-- Orange -->
            </linearGradient>
        </defs>
        <path d="M243.31,90.91l-128.4,128.4a16,16,0,0,1-22.62,0l-71.62-72a16,16,0,0,1,0-22.61l20-20a16,16,0,0,1,22.58,0L104,144.22l96.76-95.57a16,16,0,0,1,22.59,0l19.95,19.54A16,16,0,0,1,243.31,90.91Z"></path>
    </svg>

    <!-- Error Icon -->
    <svg id="errorIcon" class="icon error-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" style="display: none;">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#FFD700" /> <!-- Yellow -->
                <stop offset="100%" stop-color="#FF8C00" /> <!-- Orange -->
            </linearGradient>
        </defs>
        <path d="M168.49,104.49,145,128l23.52,23.51a12,12,0,0,1-17,17L128,145l-23.51,23.52a12,12,0,0,1-17-17L111,128,87.51,104.49a12,12,0,0,1,17-17L128,111l23.51-23.52a12,12,0,0,1,17,17ZM236,128A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path>
    </svg>

    <!-- Title -->
    <div id="statusTitle" class="title"></div>

    <!-- Message -->
    <div id="statusMessage" class="message"></div>

    <!-- Back to Home Button -->
    <a href="/" class="button">Kembali ke Beranda</a>

    <script>
        const paymentSuccessful = {{ $paymentSuccessful }};    

        // Elements
        const successIcon = document.getElementById('successIcon');
        const errorIcon = document.getElementById('errorIcon');
        const statusTitle = document.getElementById('statusTitle');
        const statusMessage = document.getElementById('statusMessage');

        if (paymentSuccessful === true) {
            // Show success message and icon
            successIcon.style.display = 'block';
            statusTitle.textContent = 'PEMBAYARAN BERHASIL';
            statusMessage.textContent = 'Terima Kasih Telah Melakukan Pembelian Tiket';
        } else {
            // Show error message and icon
            errorIcon.style.display = 'block';
            statusTitle.textContent = 'PEMBAYARAN GAGAL';
            statusMessage.textContent = 'Waktu Pembayaran Telah Habis';
        }
    </script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>
