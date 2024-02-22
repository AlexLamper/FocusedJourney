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
            background-image: url("/images/img.jpg");
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
                    <svg style="margin-left: 20px" fill="#ffffff" height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier"> <g> <path d="M192,64H32C14.328,64,0,78.328,0,96v96c0,17.672,14.328,32,32,32s32-14.328,32-32v-64h128c17.672,0,32-14.328,32-32 S209.672,64,192,64z"/> <path d="M480,64H320c-17.672,0-32,14.328-32,32s14.328,32,32,32h128v64c0,17.672,14.328,32,32,32s32-14.328,32-32V96 C512,78.328,497.672,64,480,64z"/> <path d="M480,288c-17.672,0-32,14.328-32,32v64H320c-17.672,0-32,14.328-32,32s14.328,32,32,32h160c17.672,0,32-14.328,32-32v-96 C512,302.328,497.672,288,480,288z"/> <path d="M192,384H64v-64c0-17.672-14.328-32-32-32S0,302.328,0,320v96c0,17.672,14.328,32,32,32h160c17.672,0,32-14.328,32-32 S209.672,384,192,384z"/> </g> </g>
                    </svg>
                </button>
            </div>
            <div style="width: 50%; text-align: center;">
                <div class="p-5">
                    <h2 style="font-size: 1.7rem; color: white" id="quoteText"></h2>
                    <br>
                    <p id="quoteAuthor" style="color: white; font-size: 1.3rem;"></p>
                </div>
                <button onclick="fetchQuote()">
                    <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.698 489.698" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M468.999,227.774c-11.4,0-20.8,8.3-20.8,19.8c-1,74.9-44.2,142.6-110.3,178.9c-99.6,54.7-216,5.6-260.6-61l62.9,13.1 c10.4,2.1,21.8-4.2,23.9-15.6c2.1-10.4-4.2-21.8-15.6-23.9l-123.7-26c-7.2-1.7-26.1,3.5-23.9,22.9l15.6,124.8 c1,10.4,9.4,17.7,19.8,17.7c15.5,0,21.8-11.4,20.8-22.9l-7.3-60.9c101.1,121.3,229.4,104.4,306.8,69.3 c80.1-42.7,131.1-124.8,132.1-215.4C488.799,237.174,480.399,227.774,468.999,227.774z"></path> <path d="M20.599,261.874c11.4,0,20.8-8.3,20.8-19.8c1-74.9,44.2-142.6,110.3-178.9c99.6-54.7,216-5.6,260.6,61l-62.9-13.1 c-10.4-2.1-21.8,4.2-23.9,15.6c-2.1,10.4,4.2,21.8,15.6,23.9l123.8,26c7.2,1.7,26.1-3.5,23.9-22.9l-15.6-124.8 c-1-10.4-9.4-17.7-19.8-17.7c-15.5,0-21.8,11.4-20.8,22.9l7.2,60.9c-101.1-121.2-229.4-104.4-306.8-69.2 c-80.1,42.6-131.1,124.8-132.2,215.3C0.799,252.574,9.199,261.874,20.599,261.874z"></path> </g> </g> </g></svg>
                </button>
            </div>
            <div style="width: 25%; display: flex;">
                <div style="flex-grow: 1;"></div>
                <div>
                    <button onclick="toggleSettingsPopup()">
                        <svg style="margin-right: 20px" fill="#ffffff" height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.802 489.802" xml:space="preserve" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier"> <g> <path d="M20.701,281.901l32.1,0.2c4.8,24.7,14.3,48.7,28.7,70.5l-22.8,22.6c-8.2,8.1-8.2,21.2-0.2,29.4l24.6,24.9 c8.1,8.2,21.2,8.2,29.4,0.2l22.8-22.6c21.6,14.6,45.5,24.5,70.2,29.5l-0.2,32.1c-0.1,11.5,9.2,20.8,20.7,20.9l35,0.2 c11.5,0.1,20.8-9.2,20.9-20.7l0.2-32.1c24.7-4.8,48.7-14.3,70.5-28.7l22.6,22.8c8.1,8.2,21.2,8.2,29.4,0.2l24.9-24.6 c8.2-8.1,8.2-21.2,0.2-29.4l-22.6-22.8c14.6-21.6,24.5-45.5,29.5-70.2l32.1,0.2c11.5,0.1,20.8-9.2,20.9-20.7l0.2-35 c0.1-11.5-9.2-20.8-20.7-20.9l-32.1-0.2c-4.8-24.7-14.3-48.7-28.7-70.5l22.8-22.6c8.2-8.1,8.2-21.2,0.2-29.4l-24.6-24.9 c-8.1-8.2-21.2-8.2-29.4-0.2l-22.8,22.6c-21.6-14.6-45.5-24.5-70.2-29.5l0.2-32.1c0.1-11.5-9.2-20.8-20.7-20.9l-35-0.2 c-11.5-0.1-20.8,9.2-20.9,20.7l-0.3,32.1c-24.8,4.8-48.8,14.3-70.5,28.7l-22.6-22.8c-8.1-8.2-21.2-8.2-29.4-0.2l-24.8,24.6 c-8.2,8.1-8.2,21.2-0.2,29.4l22.6,22.8c-14.6,21.6-24.5,45.5-29.5,70.2l-32.1-0.2c-11.5-0.1-20.8,9.2-20.9,20.7l-0.2,35 C-0.099,272.401,9.201,281.801,20.701,281.901z M179.301,178.601c36.6-36.2,95.5-35.9,131.7,0.7s35.9,95.5-0.7,131.7 s-95.5,35.9-131.7-0.7S142.701,214.801,179.301,178.601z"/> </g> </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; margin-top: 100px;">
            @if($focusSession = $focusSessions->last())
                <div id="parent-div">
                    <div style="text-align: center">
                        <h1 class="title" style="color: white">Keep focus for</h1>
                    </div>
                    <div style="text-align: center">
                        <div id="countdown_{{ $focusSession->id }}" style="font-weight: bold; font-size: 8rem; color: white"></div>
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
                    <button style="color: white">Pause Timer</button>
                </div>
                <div style="width: 33%;">
                    <button style="color: white">Reset Timer</button>
                </div>
                <div style="width: 33%;">
                    <button style="color: white">Timer Settings</button>
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

        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }

        function fetchQuote(){
            fetch('https://api.quotable.io/random')
                .then(response => response.json())
                .then(data => {
                    hasBeenCalled = true;
                    document.getElementById('quoteText').textContent = data.content;
                })
                .catch(error => console.error('Error fetching quote:', error));
        }

    </script>
    <script>
        let hasBeenCalled = false;
        // Function to fetch a random quote from the API
        if (!hasBeenCalled) {
            fetch('https://api.quotable.io/random')
                .then(response => response.json())
                .then(data => {
                    hasBeenCalled = true;
                    document.getElementById('quoteText').textContent = data.content;
                    document.getElementById('quoteAuthor').textContent = data.author;
                })
                .catch(error => console.error('Error fetching quote:', error));
        } else{
            console.log("Quote fetching function can only run 1 time.")
        }
    </script>
@endforeach
</body>
</html>
