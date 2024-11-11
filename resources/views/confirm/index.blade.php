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

        /* Table container styling */
        .table-container {
            width: 100%;
            max-width: 634px;
            height: 376px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 14px;
            margin-top: 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
        }

        .header {
            width: 100%;
            height: 60px;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
            text-align: center;
            background-color: #ffecfc;
            padding: 20px;
            color: #8F3581;
        }

        .table-container h3 {
            font-size: 16px;
            font-weight: 600;
            line-height: 20.8px;
            text-align: center;
        }

        /* Item detail styling */
        .item-detail {
            width: 100%;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 600;
            text-align: left;
            padding: 8px 0;
            padding-left: 80px;
            padding-right: 80px;
            margin-top: 30px;
            flex-direction: column;
            gap: 10px;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        /* Button styling */
        .btn-container {
            position: absolute;
            bottom: 60px;
            right: 70px;
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }

        .btn-container button,
        .btn-container a {
            background: linear-gradient(180deg, rgba(143, 53, 129, 0.95) 72%, rgba(81, 13, 70, 1) 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            letter-spacing: 2px;
            text-decoration: none;
        }

        .btn-container button:hover,
        .btn-container a:hover {
            background: linear-gradient(180deg, rgba(168, 55, 143, 0.95) 72%, rgba(81, 13, 70, 1) 100%);
        }

        /* Custom modal backdrop */
.modal-backdrop {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

/* Custom modal container */
.modal-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    max-width: 400px;
    width: 90%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.modal-container h3 {
    font-size: 20px;
    color: #8F3581;
    margin-bottom: 15px;
}

.modal-container p {
    font-size: 16px;
    color: #333;
    margin-bottom: 20px;
}

/* Modal buttons */
.modal-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.modal-buttons button {
    padding: 10px 20px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    color: white;
}

.modal-buttons .confirm-btn {
    background-color: #8F3581;
}

.modal-buttons .confirm-btn:hover {
    background-color: #A8378F;
}

.modal-buttons .cancel-btn {
    background-color: #888;
}

.modal-buttons .cancel-btn:hover {
    background-color: #666;
}


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-container {
                width: 70%;
                height: 300px;
            }

            .item-detail {
                padding-left: 30px;
                padding-right: 30px;
            }

            .btn-container {
                flex-direction: row; /* Align buttons side-by-side */
                justify-content: space-between;
                width: 75%;
            }

            .btn-container button, .btn-container a {
                flex: 1; /* Let the buttons take equal width */
                margin: 5px; /* Add some spacing between buttons */
            }

            .judul {
                width: 500px;
                font-size: 24px;
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .judul {
                width: 400px;
                font-size: 20px;
                padding: 10px;
            }

            .table-container {
                width: 70%;
                margin-top: 100px;
            }

            .item-detail {
                font-size: 14px;
                gap: 8px;
            }

            .btn-container {
                flex-direction: column; /* Stack buttons vertically */
                align-items: center;
            }

            .btn-container button, .btn-container a {
                font-size: 14px;
                padding: 8px 16px;
                max-width: 300px; /* Prevent the buttons from growing too wide */
                width: 100%;
            }
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
        <div class="header">
            <h3>RINCIAN PEMBELIAN</h3>
        </div>
        <div class="item-detail">
            <div class="item-row">
                <span>Jumlah Tiket</span>
                <span>-</span>
            </div>
            <div class="item-row">
                <span>Harga</span>
                <span>-</span>
            </div>
            <hr>
            <div class="item-row">
                <span>Total Pembayaran</span>
                <span>-</span>
            </div>
        </div>        
    </div>

    <!-- Buttons -->
    <div class="btn-container mt-4">
        <button onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                <path d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z"></path>
            </svg>
            <b>KEMBALI</b>
        </button>
        <a href="#" onclick="confirmPayment(event)">
            <b>LANJUTKAN PEMBAYARAN</b>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                <path d="M237.66,133.66l-96,96A8,8,0,0,1,128,224V184H48a16,16,0,0,1-16-16V88A16,16,0,0,1,48,72h80V32a8,8,0,0,1,13.66-5.66l96,96A8,8,0,0,1,237.66,133.66Z"></path>
            </svg>
        </a>
    </div>

        <!-- Custom Confirmation Alert Modal -->
    <div class="modal-backdrop" id="confirmModal">
        <div class="modal-container">
            <h3>Konfirmasi Pembayaran</h3>
            <p>Apakah pesanan Anda sudah benar?</p>
            <div class="modal-buttons">
                <button class="confirm-btn" onclick="proceedToPayment()">Ya</button>
                <button class="cancel-btn" onclick="closeModal()">Tidak</button>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }

        function confirmPayment(event) {
            event.preventDefault();
            if (confirm("Apakah pesanan Anda sudah benar?")) {
                window.location.href = "/payment";
            }
        }

        function confirmPayment(event) {
    event.preventDefault();
    document.getElementById("confirmModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("confirmModal").style.display = "none";
}

function proceedToPayment() {
    closeModal();
    window.location.href = "/payment";
}

    </script>
</body>

</html>
