<!DOCTYPE html>
<html lang="id">
    @php
    $expireSeconds = $qrisData['expire'];
@endphp
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
            {!! QrCode::size(200)->generate($qrisData['rawQRIS']) !!}
        </div>
        <div class="payment-section">
            <p class="payment-label">Jumlah Pembayaran</p>
            <b class="payment-amount">Rp {{ number_format($qrisData['amount'], 0, ',', '.') }}</b>
        </div>

        <p class="mt-2"><strong>Expire:</strong> <span id="expire" class="fw-bold">{{ $expireSeconds }}</span> detik</p>

        <div class="d-grid gap-2">
            <button id="check-status-btn" class="btn btn-primary mt-3">Cek Status Transaksi</button>
        </div>

        <div class="mt-4 text-center" id="status-result">
            <p><strong>Status Transaksi:</strong> <span id="transaction-status"></span></p>
        </div>
    </div>       

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let elemenEXP = document.getElementById('expire');
            let count = {{ $expireSeconds }};
            const cd = setInterval(function() {
                count--;
                elemenEXP.textContent = count;
                if (count <= 0) {
                    elemenEXP.style.color = 'red';
                    clearInterval(cd);
                }
            }, 1000);

            const checkStatusBtn = document.getElementById('check-status-btn');
            
            function checkStatus() {
                checkStatusBtn.disabled = true;
                checkStatusBtn.textContent = "Memeriksa...";

                axios.post(`{{ env('API_URL') }}/qris/check-status`, {
                    trxId: "{{ $qrisData['trxID'] }}",
                    reffNumber: "{{ $qrisData['reffNumber'] }}",
                    amount: "{{ $qrisData['amount'] }}"
                })
                .then(response => {
                    console.log('Full response Cek Status:', response.data);

                    const message = response.data.message || "Status tidak ditemukan";
                    document.getElementById("transaction-status").innerText = message;

                    if (response.data.ack === '00') {
                        clearInterval(cd);
                    }

                    checkStatusBtn.disabled = false;
                    checkStatusBtn.textContent = "Cek Status Transaksi";
                })
                .catch(error => {
                    console.error('Transaction status:', error.response?.data?.message || 'Transaction not found');
                    document.getElementById("transaction-status").innerText = "Gagal memeriksa status";

                    checkStatusBtn.disabled = false;
                    checkStatusBtn.textContent = "Cek Status Transaksi";
                });
            }

            const statusInterval = setInterval(checkStatus, 5000);

            setTimeout(() => {
                clearInterval(statusInterval);
            }, count * 1000);

            checkStatusBtn.addEventListener('click', checkStatus);
        });
    </script>
</body>

</html>
