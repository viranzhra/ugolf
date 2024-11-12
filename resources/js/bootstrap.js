import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-app-key',
    cluster: 'your-app-cluster',
    forceTLS: true,
});

// Mendengarkan event untuk status perangkat
window.Echo.private('terminal.' + terminalId)
    .listen('DeviceStatusUpdated', (event) => {
        console.log(event);
        // Update UI sesuai dengan data terminal yang diterima
    });