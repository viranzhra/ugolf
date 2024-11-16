<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesai</title>
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
    {{-- <div class="judul">
        PEMBAYARAN
    </div> --}}
<div class="gabung">
    <div class="berhasil" style="margin-top: 400px;">
        <p>Terima Kasih Telah Melakukan Pembelian Tiket</p>
    </div>
    <div class="btn-container">
        <button onclick="goBack()">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                <path
                    d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z">
                </path>
            </svg> --}}
            <b>KEMBALI KE BERANDA</b>
        </button>
    </div>
</div>


<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>
