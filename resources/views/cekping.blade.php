<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Perangkat</title>
    <style>
        #status {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Status Perangkat</h1>
    <div id="status">Memuat status perangkat...</div>
    
    <script>
        // Fungsi untuk memeriksa status perangkat
        async function checkDeviceStatus() {
            try {
                const response = await fetch('http://192.168.43.138/api/check/4'); // Adjust URL as needed

                if (!response.ok) {
                    document.getElementById('status').innerText = 'Gagal mengambil status perangkat.';
                    console.error('Error:', response.status);
                    return;
                }

                const data = await response.json();
                
                // Check if the response has the expected structure
                if (data.status === 'success' && data.message) {
                    const statusText = data.inactiveDevices === 0 ? 'Aktif' : 'Tidak Aktif';
                    document.getElementById('status').innerText = `Status perangkat: ${statusText}`;
                } else {
                    document.getElementById('status').innerText = 'Data status perangkat tidak ditemukan.';
                    console.log('Unexpected data structure:', data);
                }

            } catch (error) {
                document.getElementById('status').innerText = 'Gagal terhubung ke server atau terjadi kesalahan jaringan.';
                console.error('Gagal mengirim request:', error);
            }
        }

        // Jalankan fungsi saat halaman dimuat
        checkDeviceStatus();
    </script>
</body>
</html>
