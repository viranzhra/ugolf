<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ugorf</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
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

        /* Kontrol untuk Quantity */
        .quantity-control-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            gap: 20px;
        }

        .quantity-control-wrapper button {
            color: #8F3581;
            border: none;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .quantity-control-wrapper input {
            font-size: 18px;
            text-align: center;
            width: 35%;
            height: 60px;
            border: none;
            background-color: #FFECFC;
            color: #8F3581;
            font-weight: bold;
            outline: none;
        }

        #quantity-input::placeholder {
            color: rgb(185, 185, 185);
        }

        /* Kalkulator */
        .calculator {
            display: grid;
            grid-template-columns: repeat(3, 60px);
            grid-gap: 20px;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            grid-template-rows: repeat(3, 60px);
        }

        .calc-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #FFECFC;
            color: #8F3581;
            font-size: 24px;
            font-weight: bold;
            border: 3px solid #8F3581;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .calc-btn:hover {
            background-color: #fdd6f7;
            border-color: #8F3581;
        }

        /* Tombol 0 di tengah */
        .zero {
            grid-column: 2;
            grid-row: 4;
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

            .calc-btn {
                width: 50px;
                height: 50px;
                font-size: 18px;
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
        BELI TIKET
    </div>

    <!-- Kontrol Quantity dengan Plus dan Minus -->
    <div class="input-container">
        <div class="quantity-control-wrapper">
            <button style="background: white;" type="button" id="decrement-button" onclick="decrement()">
                <svg style="background: white;" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#fca613"
                    viewBox="0 0 256 256">
                    <path
                        d="M180,128a12,12,0,0,1-12,12H88a12,12,0,0,1,0-24h80A12,12,0,0,1,180,128Zm56,0A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z">
                    </path>
                </svg>
            </button>
            <input type="text" id="quantity-input" class="form-control text-center" readonly required
                placeholder="Jumlah">
            <button style="background: white;" type="button" id="increment-button" onclick="increment()">
                <svg style="background: white;" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="#fca613"
                    viewBox="0 0 256 256">
                    <path
                        d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm40,112H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32a8,8,0,0,1,0,16Z">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Kalkulator -->
    <div class="container mt-5">
        <div class="calculator">
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
        </div>
    </div>

    <!-- Tombol Kembali dan Beli Tiket -->
    <div class="btn-container mt-4">
        <button onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z"></path></svg>
            <b>KEMBALI</b>
        </button>
        <button onclick="buyTicket()">
            <b>BELI TIKET</b>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M237.66,133.66l-96,96A8,8,0,0,1,128,224V184H48a16,16,0,0,1-16-16V88A16,16,0,0,1,48,72h80V32a8,8,0,0,1,13.66-5.66l96,96A8,8,0,0,1,237.66,133.66Z"></path></svg>
        </button>
    </div>

    <script>
        let quantity = 0;

        function increment() {
            quantity++;
            document.getElementById('quantity-input').value = quantity;
        }

        function decrement() {
            if (quantity > 0) {
                quantity--;
                document.getElementById('quantity-input').value = quantity;
            }
        }

        function appendNumber(number) {
            quantity = quantity * 10 + number;
            document.getElementById('quantity-input').value = quantity;
        }

        function goBack() {
            window.history.back();
        }

        function buyTicket() {
            alert('Tiket berhasil dibeli!');
        }
    </script>
</body>

</html>
