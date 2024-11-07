<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ugolf</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
                <svg style="background: white;" xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                    fill="#fca613" viewBox="0 0 256 256">
                    <path
                        d="M180,128a12,12,0,0,1-12,12H88a12,12,0,0,1,0-24h80A12,12,0,0,1,180,128Zm56,0A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z">
                    </path>
                </svg>
            </button>
            <input type="text" id="quantity-input" class="form-control text-center" readonly required
                placeholder="Jumlah">
            <button style="background: white;" type="button" id="increment-button" onclick="increment()">
                <svg style="background: white;" xmlns="http://www.w3.org/2000/svg" width="44" height="44"
                    fill="#fca613" viewBox="0 0 256 256">
                    <path
                        d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm40,112H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32a8,8,0,0,1,0,16Z">
                    </path>
                </svg>
            </button>
        </div>
    </div>

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
                <path
                    d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z">
                </path>
            </svg>
            <b>KEMBALI</b>
        </button>
        <button onclick="buyTicket()">
            <b>BELI TIKET</b>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256">
                <path
                    d="M237.66,133.66l-96,96A8,8,0,0,1,128,224V184H48a16,16,0,0,1-16-16V88A16,16,0,0,1,48,72h80V32a8,8,0,0,1,13.66-5.66l96,96A8,8,0,0,1,237.66,133.66Z">
                </path>
            </svg>
        </button>
    </div>

    {{-- untuk tombol clear dan hapus --}}
    <script>
        // // Fungsi untuk menghapus seluruh inputan
        // function clearInput() {
        //     const quantityInput = document.getElementById('quantity-input');
        //     quantityInput.value = '';  // Menghapus seluruh inputan
        // }

        // // Fungsi untuk menghapus karakter terakhir
        // function deleteLastCharacter() {
        //     const quantityInput = document.getElementById('quantity-input');
        //     quantityInput.value = quantityInput.value.slice(0, -1);  // Menghapus karakter terakhir
        // }
    </script>

    <script>
        let isCleared = false; // Flag to check if input was cleared

        // Function to append number to input field
        function appendNumber(number) {
            const quantityInput = document.getElementById('quantity-input');

            // If the input has been cleared, replace with new number
            if (isCleared || quantityInput.value === '' || quantityInput.value === '0') {
                quantityInput.value = number; // Start fresh with new number
                isCleared = false; // Reset the flag after adding the new number
            } else {
                quantityInput.value += number; // Append number to existing value
            }
        }

        // Function to clear the entire input field
        function clearInput() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = ''; // Clear the input field
            isCleared = true; // Set the flag to indicate input was cleared
        }

        // Function to delete the last character
        function deleteLastCharacter() {
            const quantityInput = document.getElementById('quantity-input');
            if (quantityInput.value.length > 0) {
                quantityInput.value = quantityInput.value.slice(0, -1); // Remove last character
            }
        }

        // Increment function for the increment button
        function increment() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = (parseInt(quantityInput.value) || 0) + 1; // Increment value
            isCleared = false; // Reset clear flag after increment
        }

        // Decrement function for the decrement button
        function decrement() {
            const quantityInput = document.getElementById('quantity-input');
            const currentValue = parseInt(quantityInput.value) || 0;
            if (currentValue > 0) {
                quantityInput.value = currentValue - 1; // Decrement value if greater than 0
                isCleared = false; // Reset clear flag after decrement
            }
        }

        // let quantity = 0;

        // function increment() {
        //     quantity++;
        //     document.getElementById('quantity-input').value = quantity;
        // }

        // function decrement() {
        //     if (quantity > 0) {
        //         quantity--;
        //         document.getElementById('quantity-input').value = quantity;
        //     }
        // }

        // function appendNumber(number) {
        //     quantity = quantity * 10 + number;
        //     document.getElementById('quantity-input').value = quantity;
        // }

        function goBack() {
            window.history.back();
        }

        function buyTicket() {
            alert('Tiket berhasil dibeli!');
        }
    </script>
</body>

</html>
