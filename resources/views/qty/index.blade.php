<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantity!</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Custom Alert Modal Styling */
        .custom-alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.6); /* Dark overlay */
            z-index: 1000; /* Ensure it appears on top */
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s ease;
        }

        .custom-alert.active {
            visibility: visible;
            opacity: 1;
        }

        .custom-alert .alert-box {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px 30px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .custom-alert .alert-box h4 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            color: #8F3581;
        }

        .custom-alert .alert-box p {
            margin: 0 0 20px;
            font-size: 1rem;
            color: #333333;
        }

        .custom-alert .alert-box .alert-btn {
            background-color: #8F3581;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-alert .alert-box .alert-btn:hover {
            background-color: #8F3581;
        }
    </style>
</head>

<body>
    <!-- Bagian Judul (Navbar) -->
    <div class="judul">
        BELI TIKET
    </div>

    <!-- Kontrol Quantity dengan Plus dan Minus -->
    <div class="input-container">
        <div class="quantity-control-wrapper">
            <button style="background: white;" type="button" id="decrement-button" onclick="decrement()">
                <svg style="background: white;" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#fca613" viewBox="0 0 256 256">
                    <path d="M180,128a12,12,0,0,1-12,12H88a12,12,0,0,1,0-24h80A12,12,0,0,1,180,128Zm56,0A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path>
                </svg>
            </button>
            <input type="text" id="quantity-input" class="form-control text-center" readonly required placeholder="Jumlah" oninput="toggleButton()">
            <button style="background: white;" type="button" id="increment-button" onclick="increment()">
                <svg style="background: white;" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#fca613" viewBox="0 0 256 256">
                    <path d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm40,112H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32a8,8,0,0,1,0,16Z"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Kontrol Angka dan Tombol -->
    <div class="container mt-5">
        <div class="angka">
            <button class="calc-btn" onclick="appendNumber(1)">1</button>
            <button class="calc-btn" onclick="appendNumber(2)">2</button>
            <button class="calc-btn" onclick="appendNumber(3)">3</button>
            <button class="calc-btn" onclick="appendNumber(4)">4</button>
            <button class="calc-btn" onclick="appendNumber(5)">5</button>
            <button class="calc-btn" onclick="appendNumber(6)">6</button>
            <button class="calc-btn" onclick="appendNumber(7)">7</button>
            <button class="calc-btn" onclick="appendNumber(8)">8</button>
            <button class="calc-btn" onclick="appendNumber(9)">9</button>
            <button class="calc-btn zero" onclick="appendNumber(0)">0</button>
            <button class="clear-btn" onclick="clearInput()">C</button> <!-- Tombol Clear -->
            <button class="clear-btn" onclick="deleteLastCharacter()">←</button> <!-- Tombol Hapus -->
        </div>
    </div>

    <!-- Tombol Kembali dan Beli Tiket -->
    <div class="btn-container mt-4">
        <button onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                <path d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z"></path>
            </svg>
            <b>KEMBALI</b>
        </button>
        
        <a href="/konfir" style="text-decoration: none;" id="buy-ticket-btn" class="disabled" onclick="return validateQuantity()">
            <b>BELI TIKET</b>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                <path d="M237.66,133.66l-96,96A8,8,0,0,1,128,224V184H48a16,16,0,0,1-16-16V88A16,16,0,0,1,48,72h80V32a8,8,0,0,1,13.66-5.66l96,96A8,8,0,0,1,237.66,133.66Z"></path>
            </svg>
        </a>
    </div>

    <!-- Custom Alert Box -->
    <div class="custom-alert" id="custom-alert">
        <div class="alert-box">
            <h4>Peringatan</h4>
            <p>Mohon masukkan jumlah tiket sebelum melanjutkan.</p>
            <button class="alert-btn" onclick="closeAlert()">OK</button>
        </div>
    </div>

    <script>
        let isCleared = false;

        function appendNumber(number) {
            const quantityInput = document.getElementById('quantity-input');
            if (isCleared || quantityInput.value === '' || quantityInput.value === '0') {
                quantityInput.value = number;
                isCleared = false;
            } else {
                quantityInput.value += number;
            }
            toggleButton();
        }

        function clearInput() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = '';
            isCleared = true;
            toggleButton();
        }

        function deleteLastCharacter() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = quantityInput.value.slice(0, -1);
            toggleButton();
        }

        function increment() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = (parseInt(quantityInput.value) || 0) + 1;
            toggleButton();
        }

        function decrement() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = Math.max(0, (parseInt(quantityInput.value) || 0) - 1);
            toggleButton();
        }

        function toggleButton() {
            const quantityInput = document.getElementById('quantity-input');
            const buyButton = document.getElementById('buy-ticket-btn');
            if (quantityInput.value && parseInt(quantityInput.value) > 0) {
                buyButton.classList.remove('disabled');
            } else {
                buyButton.classList.add('disabled');
            }
        }

        function validateQuantity() {
            const quantityInput = document.getElementById('quantity-input');
            if (!quantityInput.value || parseInt(quantityInput.value) <= 0) {
                showAlert();
                return false;
            }
            return true;
        }

        function showAlert() {
            document.getElementById('custom-alert').classList.add('active');
        }

        function closeAlert() {
            document.getElementById('custom-alert').classList.remove('active');
        }
    </script>
</body>

</html>
