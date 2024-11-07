<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">

    <style>
        /* General styling */
        body {
            font-family: 'Kufam', sans-serif;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
        }

        /* Header title styling */
        .judul {
            width: 100%;
            max-width: 776px;
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

        /* Table styling */
        .table-container {
            width: 100%;
            max-width: 400px;
            background-color: #FBEFFB;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
        }

        .table-container h3 {
            text-align: center;
            font-size: 18px;
            color: #8F3581;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            color: #000;
        }

        .table td {
            padding: 8px 0;
            font-size: 16px;
        }

        .table td:last-child {
            text-align: right;
        }

        .table .total {
            font-weight: bold;
            padding-top: 10px;
            border-top: 1px solid #CCC;
        }

        /* Button styling */
        .btn-container {
            display: flex;
            gap: 20px;
            margin-top: 40px;
        }

        .btn-container button {
            background: linear-gradient(180deg, rgba(143, 53, 129, 0.95) 72%, rgba(81, 13, 70, 1) 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            letter-spacing: 2px;
        }

        .btn-container button:hover {
            background: linear-gradient(180deg, rgba(168, 55, 143, 0.95) 72%, rgba(81, 13, 70, 1) 100%);
        }
    </style>
</head>

<body>

    <!-- Header title -->
    <div class="judul">
        KONFIRMASI
    </div>

    <!-- Table container -->
    <div class="table-container">
        <h3>RINCIAN PEMBELIAN</h3>
        <table class="table">
            <tr>
                <td>Jumlah Tiket</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>Rp 100.000</td>
            </tr>
            <tr class="total">
                <td>Total Pembayaran</td>
                <td>Rp 100.000</td>
            </tr>
        </table>
    </div>

    <!-- Button container -->
    <div class="btn-container">
        <button onclick="goBack()">
            <b>KEMBALI</b>
        </button>
        <button onclick="buyTicket()">
            <b>LANJUTKAN PEMBAYARAN</b>
        </button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }

        function buyTicket() {
            // Add your buy ticket logic here
            alert('Proceeding to payment...');
        }
    </script>
</body>

</html>
