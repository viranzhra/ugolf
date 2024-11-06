<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=kufam:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <style>
        /* Prevent scrolling */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%; /* Ensures full height */
            overflow: hidden; /* Prevent scrolling */
        }

        /* Styling for the body */
        body {
            background: linear-gradient(0deg, rgba(123, 43, 112, 1) 35%, rgba(226, 100, 209, 1) 100%);
            font-family: 'figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .svg-container {
            position: absolute;
            top: 0;
            right: 0;
            max-width: 50%;
            height: auto;
        }

        .svg-left {
            position: absolute;
            bottom: 0;
            left: 0;
            max-width: 50%;
            height: auto;
        }

        /* Responsif: Mengatur ulang ukuran SVG saat layar lebih kecil dari 768px */
        @media (max-width: 768px) {
            .svg-container,
            .svg-left {
                max-width: 80%;
            }

            .ticket-button {
                font-size: 1rem;
                padding: 10px;
            }
        }

        /* Styling untuk button */
        .center-button {
            width: 500px;
            height: 126px;
            background-color: white;
            color: #7D2B71;
            padding: 10px 0px 0px 0px;
            font-size: 40px; /* Font size updated to 40px */
            font-family: 'Kufam', sans-serif; /* Font changed to Kufam */
            font-weight: 700;
            gap: 20px;
            line-height: 52px;
            border-radius: 120px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none; /* Remove the button border */
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.2); /* Increased shadow effect */
        }

        .center-button:hover {
            background-color: #7D2B71;
            color: white;
        }

        /* Styling for the UGOLF text */
        .ugolf-text {
            color: white;
            font-family: 'Kufam', sans-serif;
            margin-bottom: 70px; /* Space between text and button */
            font-size: 96px;
            font-weight: 700;
            line-height: 124.8px;
            text-align: center;
        }

        /* Styling for the image inside the button */
        .ticket-image {
            width: 70px; /* Adjust the size of the image */
            height: 70px;
        }

    </style>
</head>

<body>

    <div>
        <!-- SVG element positioned in the top right corner -->
        <svg class="svg-container" width="645" height="797" viewBox="0 0 645 797" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M872.95 337.805C836.732 419.41 716.401 399.793 632.857 431.28C559.407 458.962 492.256 539.027 419.923 508.544C347.806 478.151 355.813 375.444 327.369 302.537C301.66 236.638 250.433 177.983 263.866 108.534C279.208 29.2107 327.29 -47.4302 401.317 -79.7954C474.745 -111.899 558.234 -85.7305 630.899 -51.9363C697.375 -21.0203 742.581 34.6241 781.26 96.9041C828.384 172.781 909.184 256.165 872.95 337.805Z"
                fill="url(#paint0_linear_99_769)" />
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M983.518 357.791C923.863 424.216 815.477 368.386 726.293 372.523C647.883 376.161 559.283 431.565 499.905 380.228C440.705 329.043 480.049 233.834 475.519 155.705C471.425 85.0874 440.824 13.4761 475.054 -48.4266C514.15 -119.13 583.557 -177.168 663.962 -185.082C743.715 -192.931 815.037 -142.251 873.708 -87.662C927.382 -37.722 953.186 29.1656 970.733 100.348C992.112 187.072 1043.2 291.338 983.518 357.791Z"
                fill="url(#paint1_linear_99_769)" />
            <defs>
                <linearGradient id="paint0_linear_99_769" x1="-58.999" y1="-532.5" x2="778.001" y2="342.5"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFE2FB" stop-opacity="0.2" />
                    <stop offset="1" stop-color="#7D2B71" />
                </linearGradient>
                <linearGradient id="paint1_linear_99_769" x1="1051.8" y1="235.046" x2="174.5" y2="-258"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFE2FB" stop-opacity="0.2" />
                    <stop offset="1" stop-color="#7D2B71" />
                </linearGradient>
            </defs>
        </svg>

        <!-- SVG element positioned in the bottom left corner -->
        <svg class="svg-left" width="572" height="574" viewBox="0 0 572 574" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M62.3372 100.316C148.59 77.2634 208.88 183.233 285.844 228.483C353.509 268.266 457.988 270.255 479.681 345.691C501.311 420.902 416.348 479.161 377.465 547.078C342.32 608.466 328.836 685.165 266.35 718.319C194.981 756.187 105.141 766.888 33.469 729.597C-37.6225 692.607 -69.6804 611.197 -89.0061 533.424C-106.686 462.274 -91.7636 392.152 -67.5792 322.942C-38.1148 238.622 -23.9537 123.379 62.3372 100.316Z"
                fill="url(#paint0_linear_99_766)" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46476 1.71287C97.6203 6.43337 122.225 125.844 181.445 192.657C233.511 251.398 332.265 285.565 329.593 364.013C326.93 442.227 228.125 471.39 170.163 523.973C117.773 571.501 81.254 640.283 11.5828 652.512C-67.9937 666.479 -156.745 648.904 -213.391 591.295C-269.578 534.153 -274.919 446.822 -269.273 366.882C-264.108 293.751 -228.253 231.668 -183.871 173.315C-129.8 102.222 -80.73 -3.00971 8.46476 1.71287Z"
                fill="url(#paint1_linear_99_766)" />
            <defs>
                <linearGradient id="paint0_linear_99_766" x1="658.635" y1="566.196" x2="-399.206" y2="-395.355"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFE2FB" stop-opacity="0.2" />
                    <stop offset="1" stop-color="#7D2B71" />
                </linearGradient>
                <linearGradient id="paint1_linear_99_766" x1="1062.72" y1="172.927" x2="17.3099" y2="315.238"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFE2FB" stop-opacity="0.2" />
                    <stop offset="1" stop-color="#7D2B71" />
                </linearGradient>
            </defs>
        </svg>

        <!-- Text above the button -->
        <div class="ugolf-text">
            UGOLF
        </div>

        <!-- Tombol di tengah halaman -->
        <button class="center-button">
            <div class="button-text-container">
                <img src="{{ asset('image/Ticket.png') }}" alt="">
                Beli Tiket
            </div>
        </button>
    </div>


</body>

</html>
