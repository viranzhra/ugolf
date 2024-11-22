<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Device Initialization</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body{font-family:'Kufam',sans-serif;background-color:white;display:flex;flex-direction:column;align-items:center;margin:0}.judul{width:100%;max-width:776px;height:70px;background-color:#8F3581;color:white;text-align:center;padding:20px 0;font-size:28px;font-weight:bold;clip-path:polygon(0 0,100% 0,85% 100%,15% 100%);letter-spacing:5px;font-family:'Kufam',sans-serif}.btn-primary{font-family:'Kufam',sans-serif;background-color:#8F3581;border:none;margin-top:30px;border-radius:20px;transition:background-color .3s ease;outline:none}.btn-primary:hover{background-color:#4f1d49}.btn-primary:active{background-color:#b5357d}.form-container{width:38%;max-width:776px;padding:15px}@media (max-width:768px){.form-container{width:90%;margin-top:30px}}@media (max-width:576px){.form-container{width:95%}}    
</style>
</head>
<body>

    <script>
        if (localStorage.getItem('initialized') === 'true') {window.location.href = '/awal';}

        $(document).ready(function () {
            $('.btn-primary').on('mousedown', function () {
                $(this).css('background-color', '#b5357d');
            });
    
            $('.btn-primary').on('mouseup', function () {
                $(this).css('background-color', '#8F3581');
            });
        });
    </script>
    
    <div class="judul">Device Initialization</div>

    <div class="form-container mt-5">
        <div id="alert" class="alert d-none" role="alert"></div>
        <form style="background-color: #ffeefc; box-shadow: 2px 5px 10px rgb(0 0 0 / 10%);" id="initForm" class="p-4 border rounded">
            <div class="mb-3">
                <label for="fe_code" class="form-label">FE Code</label>
                <input style="border-radius: 20px;" type="text" value="21" class="form-control" id="fe_code" name="fe_code" required>
            </div>
            <div class="mb-3">
                <label for="merchant_code" class="form-label">Merchant Code</label>
                <input style="border-radius: 20px;" type="text" value="3200124010015" class="form-control" id="merchant_code" name="merchant_code" required>
            </div>
            <div class="mb-3">
                <label for="terminal_code" class="form-label">Terminal Code</label>
                <input style="border-radius: 20px;" type="text" value="10010005" class="form-control" id="terminal_code" name="terminal_code" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Initialize</button>
        </form>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#initForm').on('submit', function (event) {
                event.preventDefault();

                const alertBox = $('#alert');
                const feCode = $('#fe_code').val();
                const merchantCode = $('#merchant_code').val();
                const terminalCode = $('#terminal_code').val();

                $.ajax({
                    url: `{{ env('API_URL') }}/frontend/init`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        fe_code: feCode,
                        merchant_code: merchantCode,
                        terminal_code: terminalCode,
                    },
                    success: function (response) {
                        if (response.status) {                            
                            $.ajax({
                                url: '/update-env',
                                type: 'POST',
                                data: {
                                    FE_CODE: feCode,
                                    MERCHANT_ID: merchantCode,
                                    TERMINAL_ID: terminalCode
                                },
                                success: function() {
                                    localStorage.setItem('fe_code', feCode);
                                    localStorage.setItem('merchant_code', merchantCode);
                                    localStorage.setItem('terminal_code', terminalCode);
                                    localStorage.setItem('initialized', 'true');
                                    window.location.href = '/awal';
                                },
                                error: function() {
                                    alertBox.removeClass('d-none alert-success').addClass('alert-danger')
                                        .text('Failed to update environment variables.');
                                }
                            });
                            
                        } else {
                            alertBox.removeClass('d-none alert-success').addClass('alert-danger').text(response.message + ' (Code: ' + response.code + ')');
                        }
                    },
                    error: function (xhr) {
                        alertBox.removeClass('d-none alert-success').addClass('alert-danger')
                            .text('An error occurred. Please try again.');
                    }
                });            
            });        
        });
    </script>
</body>
</html>
