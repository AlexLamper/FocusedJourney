<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Questrial&display=swap" rel="stylesheet">
    <title>Focused Journey</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        html {
            margin: 0;
            padding: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' viewBox='0 0 800 450' opacity='1'%3E%3Cdefs%3E%3Cfilter id='bbblurry-filter' x='-100%25' y='-100%25' width='400%25' height='400%25' filterUnits='objectBoundingBox' primitiveUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeGaussianBlur stdDeviation='71' x='0%25' y='0%25' width='100%25' height='100%25' in='SourceGraphic' edgeMode='none' result='blur'%3E%3C/feGaussianBlur%3E%3C/filter%3E%3C/defs%3E%3Cg filter='url(%23bbblurry-filter)'%3E%3Cellipse rx='225' ry='194.5' cx='-1.7856292724609375' cy='13.708206176757812' fill='%23fad2d2ff'%3E%3C/ellipse%3E%3Cellipse rx='225' ry='194.5' cx='814.8951970880681' cy='185.89213700727987' fill='%234aace5ff'%3E%3C/ellipse%3E%3C/g%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }
        #section{
            font-family: "EB Garamond", serif;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
        }
        .div-wrapper img {
            position: absolute;
            left: 0;
            bottom: 0;
        }

        /*Settings Styling*/
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            z-index: 999; /* Ensure it's above other content */
        }

        /* Styles for the settings popup */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            z-index: 1000; /* Ensure it's above other content */
        }

        /* Styles for the settings popup */
        #settingsPopup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            max-height: 80vh;
            overflow-y: auto;
            z-index: 2000; /* Ensure it's above the overlay */
        }

        .popup-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .popup-content {
            margin-bottom: 20px;
        }

        .popup-section {
            margin-bottom: 15px;
        }

        .popup-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
        }

        .popup-list {
            list-style-type: none;
            padding-left: 0;
        }

        .popup-list-item {
            margin-bottom: 5px;
        }

        /* Close button */
        .popup-close-btn {
            background-color: #ddd;
            border: none;
            color: #333;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .popup-close-btn:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body class="antialiased">
<div id="overlay"></div>
<x-app-layout>
    <section id="section" style="min-height: 93vh; display: flex; flex-direction: column;">
        <div style="height: 15%; display: flex; justify-content: space-between; padding-top: 20px">
            <div style="width: 25%;">
                <button onclick="toggleFullScreen()">
                    <svg style="margin-left: 20px;" fill="#1c1c1c" height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#1c1c1c">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier"> <g> <path d="M192,64H32C14.328,64,0,78.328,0,96v96c0,17.672,14.328,32,32,32s32-14.328,32-32v-64h128c17.672,0,32-14.328,32-32 S209.672,64,192,64z"/> <path d="M480,64H320c-17.672,0-32,14.328-32,32s14.328,32,32,32h128v64c0,17.672,14.328,32,32,32s32-14.328,32-32V96 C512,78.328,497.672,64,480,64z"/> <path d="M480,288c-17.672,0-32,14.328-32,32v64H320c-17.672,0-32,14.328-32,32s14.328,32,32,32h160c17.672,0,32-14.328,32-32v-96 C512,302.328,497.672,288,480,288z"/> <path d="M192,384H64v-64c0-17.672-14.328-32-32-32S0,302.328,0,320v96c0,17.672,14.328,32,32,32h160c17.672,0,32-14.328,32-32 S209.672,384,192,384z"/> </g> </g>
                    </svg>
                </button>
            </div>
            <div style="width: 50%; text-align: center;">
                <div class="p-5">
                    <h2 style="font-size: 1.5rem;">Look up at the stars and not down at your feet. Try to make sense of what you see, and wonder about what makes the universe exist. Be curious.</h2>
                    <br>
                    <p>Stephen Hawking</p>
                </div>
            </div>
            <div style="width: 25%; display: flex;">
                <div style="flex-grow: 1;"></div>
                <div>
                    <button onclick="toggleSettingsPopup()">
                        <svg style="margin-right: 20px" fill="#242424" height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.802 489.802" xml:space="preserve" stroke="#242424">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path d="M20.701,281.901l32.1,0.2c4.8,24.7,14.3,48.7,28.7,70.5l-22.8,22.6c-8.2,8.1-8.2,21.2-0.2,29.4l24.6,24.9 c8.1,8.2,21.2,8.2,29.4,0.2l22.8-22.6c21.6,14.6,45.5,24.5,70.2,29.5l-0.2,32.1c-0.1,11.5,9.2,20.8,20.7,20.9l35,0.2 c11.5,0.1,20.8-9.2,20.9-20.7l0.2-32.1c24.7-4.8,48.7-14.3,70.5-28.7l22.6,22.8c8.1,8.2,21.2,8.2,29.4,0.2l24.9-24.6 c8.2-8.1,8.2-21.2,0.2-29.4l-22.6-22.8c14.6-21.6,24.5-45.5,29.5-70.2l32.1,0.2c11.5,0.1,20.8-9.2,20.9-20.7l0.2-35 c0.1-11.5-9.2-20.8-20.7-20.9l-32.1-0.2c-4.8-24.7-14.3-48.7-28.7-70.5l22.8-22.6c8.2-8.1,8.2-21.2,0.2-29.4l-24.6-24.9 c-8.1-8.2-21.2-8.2-29.4-0.2l-22.8,22.6c-21.6-14.6-45.5-24.5-70.2-29.5l0.2-32.1c0.1-11.5-9.2-20.8-20.7-20.9l-35-0.2 c-11.5-0.1-20.8,9.2-20.9,20.7l-0.3,32.1c-24.8,4.8-48.8,14.3-70.5,28.7l-22.6-22.8c-8.1-8.2-21.2-8.2-29.4-0.2l-24.8,24.6 c-8.2,8.1-8.2,21.2-0.2,29.4l22.6,22.8c-14.6,21.6-24.5,45.5-29.5,70.2l-32.1-0.2c-11.5-0.1-20.8,9.2-20.9,20.7l-0.2,35 C-0.099,272.401,9.201,281.801,20.701,281.901z M179.301,178.601c36.6-36.2,95.5-35.9,131.7,0.7s35.9,95.5-0.7,131.7 s-95.5,35.9-131.7-0.7S142.701,214.801,179.301,178.601z"/>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; margin-top: 100px;">
            @if($focusSession = $focusSessions->last())
                <div id="parent-div">
                    <div style="text-align: center">
                        <h1 class="title" style="color: #8f8f8f">Keep focus for</h1>
                    </div>
                    <div style="text-align: center">
                        <div id="countdown_{{ $focusSession->id }}" style="font-weight: bold; font-size: 6rem;"></div>
                    </div>
                </div>
            @else
                <div class="notification is-info">
                    <p>No focus sessions found.</p>
                </div>
            @endif
        </div>
        <div style="height: 15%; display: flex; justify-content: center;">
            <div style="width: 30%; display: flex; justify-content: space-between; text-align: center; padding-bottom: 3rem">
                <div style="width: 33%;">
                    <button>Pause Timer</button>
                </div>
                <div style="width: 33%;">
                    <button>Reset Timer</button>
                </div>
                <div style="width: 33%;">
                    <button>Timer Settings</button>
                </div>
            </div>
        </div>

    </section>
</x-app-layout>

@foreach ($focusSessions as $focusSession)

    <!-- Settings Popup -->
    <div id="settingsPopup">
        <div class="popup-header">Settings</div>
        <div class="popup-content">
            <div class="popup-section">
                <div class="popup-title">Appearance</div>
                <ul class="popup-list">
                    <li class="popup-list-item">Theme: Light/Dark</li>
                    <li class="popup-list-item">Font Size: Small/Medium/Large</li>
                    <li class="popup-list-item">Background Image: Choose from gallery</li>
                </ul>
            </div>
            <div class="popup-section">
                <div class="popup-title">Notifications</div>
                <ul class="popup-list">
                    <li class="popup-list-item">Enable/Disable Desktop Notifications</li>
                    <li class="popup-list-item">Sound: On/Off</li>
                </ul>
            </div>
            <div class="popup-section">
                <div class="popup-title">Account</div>
                <ul class="popup-list">
                    <li class="popup-list-item">Change Password</li>
                    <li class="popup-list-item">Logout</li>
                </ul>
            </div>
        </div>
        <!-- Close button -->
        <button class="popup-close-btn" onclick="toggleSettingsPopup()">Close</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var countdown_{{ $focusSession->id }} = {{ $focusSession->duration }} * 60; // Convert minutes to seconds
            var countdownInterval_{{ $focusSession->id }} = setInterval(function() {
                var hours = Math.floor(countdown_{{ $focusSession->id }} / 3600);
                var minutes = Math.floor((countdown_{{ $focusSession->id }} % 3600) / 60);
                var seconds = countdown_{{ $focusSession->id }} % 60;
                var countdownElement = document.getElementById("countdown_{{ $focusSession->id }}");
                if (countdownElement) {
                    var countdownText = '';
                    if (hours > 0) {
                        countdownText += pad(hours) + "h ";
                    }
                    if (hours > 0 || minutes > 0) {
                        countdownText += pad(minutes) + "m ";
                    }
                    countdownText += pad(seconds) + "s";
                    countdownElement.textContent = countdownText;
                }
                countdown_{{ $focusSession->id }}--;
                if (countdown_{{ $focusSession->id }} < 0) {
                    clearInterval(countdownInterval_{{ $focusSession->id }});
                    if (countdownElement) {
                        countdownElement.textContent = "Focus session ended";
                    }
                }
            }, 1000);

            // Function to pad single digits with leading zeros
            function pad(number) {
                return (number < 10 ? '0' : '') + number;
            }
        });

        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }

        // Function to toggle the settings popup
        function toggleSettingsPopup() {
            var overlay = document.getElementById("overlay");
            var popup = document.getElementById("settingsPopup");
            if (popup.style.display === "none") {
                overlay.style.display = "block";
                popup.style.display = "block";
                // Add event listener to the overlay to close the popup when clicked outside
                overlay.addEventListener("click", closeSettingsPopupOutside);
            } else {
                overlay.style.display = "none";
                popup.style.display = "none";
                // Remove event listener when the popup is closed
                overlay.removeEventListener("click", closeSettingsPopupOutside);
            }
        }

        // Function to close the settings popup when clicked outside
        function closeSettingsPopupOutside(event) {
            var popup = document.getElementById("settingsPopup");
            // If the click target is not inside the popup, close the popup
            if (!popup.contains(event.target)) {
                toggleSettingsPopup();
            }
        }

    </script>
@endforeach
</body>
</html>
