<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <style>
        /* Prevent scrolling */
        html,
        body {
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

        .modal-item-details {
            padding-left: 40px;
            padding-right: 40px;
            color: #333;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
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
            font-weight: bold;
            border: none;
            font-family: 'Kufam', sans-serif;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
            margin-top: 60px;
        }

        .modal-buttons .confirm-btn {
            background-color: #ce52bc;
        }

        .modal-buttons .confirm-btn:hover {
            background-color: #8F3581;
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
                flex-direction: row;
                /* Align buttons side-by-side */
                justify-content: space-between;
                width: 75%;
            }

            .btn-container button,
            .btn-container a {
                flex: 1;
                /* Let the buttons take equal width */
                margin: 5px;
                /* Add some spacing between buttons */
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
                flex-direction: column;
                /* Stack buttons vertically */
                align-items: center;
            }

            .btn-container button,
            .btn-container a {
                font-size: 14px;
                padding: 8px 16px;
                max-width: 300px;
                /* Prevent the buttons from growing too wide */
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Header title -->
    <div class="judul">KONFIRMASI</div>

    <!-- Table container -->
    <div class="table-container">
        <div class="header">
            <h3>RINCIAN PEMBELIAN</h3>
        </div>
        <div class="item-detail">
            <div class="item-row">
                <span>Jumlah Tiket</span>
                <span id="source-ticket-quantity">{{ session('quantity', 0) }}</span>
            </div>
            <div class="item-row">
                <span>Harga per Tiket</span>
                <span id="source-harga">-</span>
            </div>
            <hr>
            <div class="item-row">
                <span>Total Pembayaran</span>
                <span id="source-total-pembayaran">-</span>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="btn-container mt-4">
        <button onclick="goBack()">
            <b>KEMBALI</b>
        </button>
        <a href="#" onclick="confirmPayment(event)">
            <b>LANJUTKAN PEMBAYARAN</b>
        </a>
    </div>

    <!-- Custom Confirmation Alert Modal -->
    <div class="modal-backdrop" id="confirmModal" style="display: none;">
        <div class="modal-container">
            <h3>Konfirmasi Pembayaran</h3>
            <p>Apakah pesanan Anda sudah sesuai?</p>
            <div class="modal-item-details">
                <div class="item-row">
                    <span>Jumlah Tiket:</span>
                    <span id="modal-ticket-quantity">-</span>
                </div>
                <div class="item-row">
                    <span>Harga per Tiket:</span>
                    <span id="modal-harga">-</span>
                </div>
                <hr>
                <div class="item-row">
                    <span>Total Pembayaran:</span>
                    <span id="modal-total-pembayaran">-</span>
                </div>
            </div>
            <div class="modal-buttons">
                <form id="paymentForm" action="{{ route('pembayaran') }}" method="POST">
                    @csrf
                    <input type="hidden" name="qty" id="hidden-ticket-quantity">
                    <button type="submit" class="confirm-btn">Ya</button>
                </form>
                <button class="cancel-btn" onclick="closeModal()">Tidak</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil jumlah tiket dari session atau localStorage
            const ticketQuantity = localStorage.getItem('ticketQuantity') || "{{ session('quantity', 0) }}";
            const terminalCode = localStorage.getItem('terminal_code') || "{{ session('quantity', 0) }}";
            
            document.getElementById('source-ticket-quantity').textContent = ticketQuantity;

            // Fetch harga dari API dan tampilkan di rincian pembelian
            fetch(`{{ env('API_URL') }}/cms/get-by-code/${terminalCode}`)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengakses API');
                    return response.json();
                })
                .then(data => {
                    const hargaData = data.data.find(item => item.cms_code > 0);
                    if (hargaData) {
                        const harga = parseFloat(hargaData.cms_value);

                        // // Format tampilan harga sebagai "Jumlah Tiket x Harga per Tiket"
                        // document.getElementById('source-harga').textContent =
                        //     `${ticketQuantity} x ${harga.toLocaleString()}`;

                        // // Hitung dan tampilkan total pembayaran
                        // const totalPembayaran = harga * ticketQuantity;
                        // document.getElementById('source-total-pembayaran').textContent = totalPembayaran
                        //     .toLocaleString();

                        document.getElementById('source-harga').textContent = `Rp ${harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;
                    //document.getElementById('source-harga').textContent = `${ticketQuantity} x Rp ${harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;

                    // Hitung dan tampilkan total pembayaran
                    const totalPembayaran = harga * ticketQuantity;
                    document.getElementById('source-total-pembayaran').textContent = `Rp ${totalPembayaran.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                    document.getElementById('source-harga').textContent = '-';
                    document.getElementById('source-total-pembayaran').textContent = '-';
                });
        });

        function confirmPayment(event) {
            event.preventDefault();
            const ticketQuantity = document.getElementById('source-ticket-quantity').textContent;
            const harga = document.getElementById('source-harga').textContent;
            const totalPembayaran = document.getElementById('source-total-pembayaran').textContent;

            document.getElementById('modal-ticket-quantity').textContent = ticketQuantity;
            document.getElementById('modal-harga').textContent = harga;
            document.getElementById('modal-total-pembayaran').textContent = totalPembayaran;

            document.getElementById('hidden-ticket-quantity').value = ticketQuantity;
            document.getElementById('confirmModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }


        function goBack() {
            window.history.back();
        }

        // Ambil jumlah tiket dari session atau localStorage
        const ticketQuantity = localStorage.getItem('ticketQuantity') || "{{ session('quantity', 0) }}";
        document.getElementById('source-ticket-quantity').textContent = ticketQuantity;

        // Fetch harga dari API dan tampilkan di rincian pembelian
        fetch(`{{ env('API_URL') }}/cms`)
            .then(response => {
                if (!response.ok) throw new Error('Gagal mengakses API');
                return response.json();
            })
            .then(data => {
                const hargaData = data.data.find(item => item.cms_code === 1);
                if (hargaData) {
                    const harga = parseFloat(hargaData.cms_value);

                    // Format tampilan harga sebagai "Jumlah Tiket x Harga per Tiket"
                    document.getElementById('source-harga').textContent = `Rp ${harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;
                    //document.getElementById('source-harga').textContent = `${ticketQuantity} x Rp ${harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;

                    // Hitung dan tampilkan total pembayaran
                    const totalPembayaran = harga * ticketQuantity;
                    document.getElementById('source-total-pembayaran').textContent = `Rp ${totalPembayaran.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}`;
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
                document.getElementById('source-harga').textContent = '-';
                document.getElementById('source-total-pembayaran').textContent = '-';
            });
    </script>
</body>


</html>
