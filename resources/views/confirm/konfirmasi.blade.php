<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
         /* Prevent scrolling */
         html, body {
            margin: 0;
            padding: 0;
            height: 100%; /* Ensures full height */
            overflow: hidden; /* Prevent scrolling */
        }
        
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Kufam', sans-serif;
            background-color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            position: relative;
        }

        .judul {
            width: 776px;
            height: 70px;
            background-color: #8F3581;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 28px;
            font-weight: bold;
            clip-path: polygon(0 0, 100% 0, 85% 100%, 15% 100%);
            letter-spacing: 5px;
        }

        /* Posisi tombol Kembali dan Beli Tiket */
        .btn-container {
            position: absolute;
            bottom: 60px;
            right: 70px;
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }

        .btn-container button {
            background: rgb(143, 53, 129);
            background: linear-gradient(180deg, rgba(143, 53, 129, 0.9557072829131653) 72%, rgba(81, 13, 70, 1) 100%);
            color: white;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            letter-spacing: 2px;
        }

        .btn-container button:hover {
            background: linear-gradient(180deg, rgba(168, 55, 143, 0.95) 72%, rgba(81, 13, 70, 1) 100%);
        }

        @media (max-width: 576px) {
            .quantity-control-wrapper {
                flex-direction: column;
                gap: 15px;
            }

            .quantity-control-wrapper button,
            .quantity-control-wrapper input {
                width: 100%;
                max-width: 300px;
            }

            .btn-container {
                position: static;
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .judul {
                font-size: 28px;
                padding: 15px 0;
            }
        }

        @media (max-width: 768px) {
            .judul {
                font-size: 30px;
                padding: 18px 0;
            }

            .btn-container {
                right: 50px;
                bottom: 50px;
            }
        }
    </style>
</head>

<body>
    <!-- Bagian Judul (Navbar) -->
    <div class="judul">
        KONFIRMASI
    </div>

    

    <!-- Tombol Kembali dan Beli Tiket -->
    <div class="btn-container mt-4">
        <button onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z"></path></svg>
            <b>KEMBALI</b>
        </button>
        <button onclick="buyTicket()">
            <b>LANJUTKAN PEMBAYARAN</b>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M237.66,133.66l-96,96A8,8,0,0,1,128,224V184H48a16,16,0,0,1-16-16V88A16,16,0,0,1,48,72h80V32a8,8,0,0,1,13.66-5.66l96,96A8,8,0,0,1,237.66,133.66Z"></path></svg>
        </button>
    </div>
</body>

</html>
