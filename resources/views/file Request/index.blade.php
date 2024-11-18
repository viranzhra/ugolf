<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Initialization</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            font-family: 'Kufam', sans-serif;
        }

        /* Button styling */
        .btn-primary {
            font-family: 'Kufam', sans-serif;
            background-color: #8F3581;
            border: none;
            margin-top: 30px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for the button */
        .btn-primary:hover {
            background-color: #4f1d49;
        }
    </style>
</head>
<body>
    <!-- Header title -->
    <script>
        // Cek status inisialisasi
        if (localStorage.getItem('initialized') === 'true') {
            // Jika sudah diinisialisasi, alihkan ke halaman lain
            window.location.href = '/awal'; // Ganti dengan halaman tujuan
        }
    </script>

    <!-- Header title -->
    <div class="judul">Device Initialization</div>

    <div style="width: 40%;" class="container mt-5">
        <div id="alert" class="alert d-none" role="alert"></div>
        <form style="background-color: #ffeefc; box-shadow: 2px 5px 10px rgb(0 0 0 / 10%);" id="initForm" class="p-4 border rounded">
            <div class="mb-3">
                <label for="fe_code" class="form-label">FE Code</label>
                <input style="border-radius: 20px;" type="text" class="form-control" id="fe_code" name="fe_code" required>
            </div>
            <div class="mb-3">
                <label for="merchant_code" class="form-label">Merchant Code</label>
                <input style="border-radius: 20px;" type="text" class="form-control" id="merchant_code" name="merchant_code" required>
            </div>
            <div class="mb-3">
                <label for="terminal_code" class="form-label">Terminal Code</label>
                <input style="border-radius: 20px;" type="text" class="form-control" id="terminal_code" name="terminal_code" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Initialize</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#initForm').on('submit', function(event) {
                event.preventDefault();
    
                $.ajax({
                    url: `http:192.168.43.45/api/frontend/init`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        fe_code: $('#fe_code').val(),
                        merchant_code: $('#merchant_code').val(),
                        terminal_code: $('#terminal_code').val(),
                    },
                    success: function(response) {
                        const alertBox = $('#alert');
                        if (response.status) {
                            alertBox.removeClass('d-none alert-danger').addClass('alert-success')
                                    .text(response.message);

                            // Simpan status inisialisasi ke localStorage
                            localStorage.setItem('initialized', 'true');
    
                            // Redirect ke halaman home (index.html)
                            window.location.href = '/awal';
                        } else {
                            alertBox.removeClass('d-none alert-success').addClass('alert-danger')
                                    .text(response.message + ' (Code: ' + response.code + ')');
                        }
                    },
                    error: function(xhr) {
                        $('#alert').removeClass('d-none alert-success').addClass('alert-danger')
                                .text('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script> 

    <script>
        document.getElementById('initForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Ambil nilai inputan
            const feCode = document.getElementById('fe_code').value;
            const merchantCode = document.getElementById('merchant_code').value;
            const terminalCode = document.getElementById('terminal_code').value;

            // Simpan ke localStorage
            localStorage.setItem('fe_code', feCode);
            localStorage.setItem('merchant_code', merchantCode);
            localStorage.setItem('terminal_code', terminalCode);

            // Tandai inisialisasi berhasil
            localStorage.setItem('initialized', 'true');

            // Arahkan ke halaman /awal setelah berhasil
            window.location.href = '/awal';
        });

    </script>


    {{-- <div class="judul">Device Initialization</div>

    <div style="width: 45%;" class="container mt-5">
        <div id="alert" class="alert d-none" role="alert"></div>
        <form style="background-color: #fafafa; box-shadow: 2px 5px 10px rgb(0 0 0 / 10%);" id="initForm" class="p-4 border rounded">
            <div class="mb-3">
                <label for="fe_code" class="form-label">FE Code</label>
                <input style="border-radius: 20px;" type="text" class="form-control" id="fe_code" name="fe_code" required>
            </div>
            <div class="mb-3">
                <label for="merchant_code" class="form-label">Merchant Code</label>
                <input style="border-radius: 20px;" type="text" class="form-control" id="merchant_code" name="merchant_code" required>
            </div>
            <div class="mb-3">
                <label for="terminal_code" class="form-label">Terminal Code</label>
                <input style="border-radius: 20px;" type="text" class="form-control" id="terminal_code" name="terminal_code" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Initialize</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#initForm').on('submit', function(event) {
                event.preventDefault();
    
                $.ajax({
                    url: `{{ env('API_URL') }}/frontend/init`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        fe_code: $('#fe_code').val(),
                        merchant_code: $('#merchant_code').val(),
                        terminal_code: $('#terminal_code').val(),
                    },
                    success: function(response) {
                        const alertBox = $('#alert');
                        if (response.status) {
                            alertBox.removeClass('d-none alert-danger').addClass('alert-success')
                                    .text(response.message);
                            // alert('Device initialization successful! Price: ' + response.data.price);
    
                            // Redirect to the home page (index.html) on success
                            window.location.href = '/awal';
                        } else {
                            alertBox.removeClass('d-none alert-success').addClass('alert-danger')
                                    .text(response.message + ' (Code: ' + response.code + ')');
                        }
                    },
                    error: function(xhr) {
                        $('#alert').removeClass('d-none alert-success').addClass('alert-danger')
                                .text('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>     --}}
</body>
</html>
