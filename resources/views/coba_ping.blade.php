<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Perangkat</title>
    <style>
        #status_terminal {
            font-size: 20px;
            font-weight: bold;
        }
        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Status Perangkat</h1>
    <div id="status_terminal">Memuat status perangkat...</div>
    <button id="pingButton" onclick="sendPing()">Ping Manual</button>
    
    <script>
        // URL backend untuk endpoint ping dan status perangkat
        const pingUrl = 'http://192.168.43.138/api/ping/2'; // Gunakan IP lokal yang sesuai
        const statusUrl = 'http://192.168.13.138/api/check/2'; // URL untuk cek status perangk2t

2      // Fungsi untuk memeriksa status perangkat
        async function checkDeviceStatus() {
            try {
                const response = await fetch(statusUrl); // Cek status perangkat
                if (!response.ok) {
                    document.getElementById('status_terminal').innerText = 'Gagal mengambil status perangkat.';
                    console.error('Error:', response.status);
                    return;
                }

                const data = await response.json();
                
                if (data.status === 'success') {
                    const statusText = data.inactiveDevices === 0 ? 'Aktif' : 'Tidak Aktif';
                    document.getElementById('status_terminal').innerText = 'Status perangkat: ' + statusText;
                    
                    // Disable or enable button based on status
                    if (data.inactiveDevices === 0) {
                        document.getElementById('pingButton').disabled = true; // Disable button if active
                    } else {
                        document.getElementById('pingButton').disabled = false; // Enable button if inactive
                    }
                } else {
                    document.getElementById('status_terminal').innerText = 'Gagal memuat status perangkat.';
                }
            } catch (error) {
                document.getElementById('status_terminal').innerText = 'Gagal terhubung ke server atau terjadi kesalahan jaringan.';
                console.error('Gagal mengirim request:', error);
            }
        }

        // Fungsi untuk mengirim ping ke backend
        async function sendPing() {
            try {
                const response = await fetch(pingUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                });

                if (response.ok) {
                    document.getElementById('status_terminal').innerText = 'Status perangkat: Aktif';
                    console.log('Ping berhasil dikirim dan status perangkat diperbarui.');
                    document.getElementById('pingButton').disabled = true; // Disable the button after successful ping
                } else {
                    document.getElementById('status_terminal').innerText = 'Status perangkat: Tidak Aktif';
                    console.log('Ping gagal dengan status:', response.status);
                    document.getElementById('pingButton').disabled = false; // Keep button enabled if failed
                }
            } catch (error) {
                document.getElementById('status_terminal').innerText = 'Status perangkat: Tidak Aktif';
                console.error('Gagal mengirim ping:', error);
                document.getElementById('pingButton').disabled = false; // Keep button enabled if error occurs
            }
        }

        // Cek status perangkat saat halaman dimuat dan setiap 5 menit sekali
        checkDeviceStatus(); // Check device status when page loads
        setInterval(checkDeviceStatus, 300000); // 300000 ms = 5 menit, check every 5 minutes
    </script>
</body>
</html>
