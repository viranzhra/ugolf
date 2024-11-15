<!DOCTYPE html>
<html lang="id">
    @php
    $expireSeconds = $qrisData['expire'];
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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

    <div class="payment-container">
        <p class="payment-instruction">Scan QR untuk melakukan pembayaran</p>
        <div class="d-flex justify-content-center mt-3">
            <div id="qris_code">
                {!! QrCode::size(200)->generate($qrisData['rawQRIS']) !!}
            </div>
            <div id="qris_pict" style="display: none">
                <img src="{{ asset('image/broken.png') }}" alt="QR Code Exp" width="150" height="150">
            </div>
        </div>
        <div class="payment-section">
            <p class="payment-label">Jumlah Pembayaran</p>
            <b class="payment-amount">Rp {{ number_format($qrisData['amount'], 0, ',', '.') }}</b>
        </div>

        <p id="main-expire" class="mt-2 text-center"><strong>Berakhir dalam:</strong><br><span id="expire"></span></p>

        <div class="mt-2 text-center">
            <p><strong><span id="transaction-status"></span></strong></p>
        </div>

        <div class="d-grid gap-2 btn-container" style="position: relative;bottom: 0;right: 0;">
            <button id="check-status-btn" class="mt-3 d-flex align-items-start"><svg id="svgBack" style="display:none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M224,88v80a16,16,0,0,1-16,16H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h80A16,16,0,0,1,224,88Z"></path></svg><b id="name-status-btn">Cek Status Transaksi</b></button>
        </div>

    </div>       

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let mainEXP = document.getElementById('main-expire');
            let elemenEXP = document.getElementById('expire');
            let count = {{ $expireSeconds }};
            
            // Display initial time
            let initialHours = Math.floor(count / 3600);
            let initialMinutes = Math.floor((count % 3600) / 60);
            let initialSeconds = count % 60;
            
            let initialTimeString = '';
            if (initialHours > 0) initialTimeString += initialHours + ' jam ';
            if (initialMinutes > 0) initialTimeString += initialMinutes + ' menit ';
            if (initialSeconds >= 0) initialTimeString += initialSeconds + ' detik';
            
            elemenEXP.textContent = initialTimeString;
            
            const cd = setInterval(function() {
                count--;
                let hours = Math.floor(count / 3600);
                let minutes = Math.floor((count % 3600) / 60);
                let seconds = count % 60;
                
                let timeString = '';
                if (hours > 0) timeString += hours + ' jam ';
                if (minutes > 0) timeString += minutes + ' menit ';
                if (seconds >= 0) timeString += seconds + ' detik';
                
                elemenEXP.textContent = timeString;
                
                if (count <= 0) {
                    elemenEXP.style.color = 'red';
                    clearInterval(cd);
                }
            }, 1000);
            
            const checkStatusBtn = document.getElementById('check-status-btn');
            const nameStatusBtn = document.getElementById('name-status-btn');
            const svgIconBack = document.getElementById('svgBack');
            
            function checkStatus() {
                checkStatusBtn.disabled = true;
                if(nameStatusBtn.textContent === "Cek Status Transaksi") {
                    nameStatusBtn.textContent = "Memeriksa...";
                }

                axios.post(`{{ env('API_URL') }}/qris/check-status`, {
                    trxId: "{{ $qrisData['trxID'] }}",
                    reffNumber: "{{ $qrisData['reffNumber'] }}",
                    amount: "{{ $qrisData['amount'] }}"
                })
                .then(response => {
                    console.log('Full response Cek Status:', response.data);

                    const message = response.data.message || "Status tidak ditemukan";

                    if (response.data.ack === '00') {
                        document.getElementById("transaction-status").innerText = message;
                        clearInterval(cd);
                    } else if (response.data.ack === '07' || response.data.ack === '08') {  
                        if(count <= 0) {
                            clearInterval(cd);
                            document.getElementById("transaction-status").innerHTML = '';
                            mainEXP.innerHTML = `<strong style="color: red">${message}</strong>`;
                        } else {
                            document.getElementById("transaction-status").innerHTML = `<span style="color: red">${message}</span>`;
                        }
                    }

                    checkStatusBtn.disabled = false;
                    nameStatusBtn.textContent = "Cek Status Transaksi";

                    if (response.data.ack === '08') {
                        qris_pict.style.display = 'flex';
                        qris_code.style.display = 'none';
                        document.querySelector('.btn-container').style = "";
                        svgIconBack.style.display = 'block';
                        checkStatusBtn.addEventListener('click', function() {window.location.href = "{{ route('qty.index') }}";});
                        nameStatusBtn.textContent = "Kembali";
                    }
                })
                .catch(error => {
                    console.error('Transaction status:', error.response?.data?.message || 'Transaction not found');
                    document.getElementById("transaction-status").innerText = "Gagal memeriksa status";

                    checkStatusBtn.disabled = false;
                    qris_pict.style.display = 'flex';
                    qris_code.style.display = 'none';
                    document.querySelector('.btn-container').style = "";
                    svgIconBack.style.display = 'block';
                    checkStatusBtn.addEventListener('click', function() {window.location.href = "{{ route('qty.index') }}";});
                    nameStatusBtn.textContent = "Kembali";
                });
            }

            const statusInterval = setInterval(checkStatus, {{ env('EXPIRED_TIME') < 120 ? 5000 : 10000 }});

            setTimeout(() => {
                clearInterval(statusInterval);
            }, count * 1000);

            checkStatusBtn.addEventListener('click', checkStatus);
        });
    </script>
</body>

</html>
