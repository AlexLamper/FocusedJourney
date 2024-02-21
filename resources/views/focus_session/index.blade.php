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
    </style>
</head>
<body class="antialiased">
<x-app-layout>
    <section id="section" style="min-height: 93vh; display: flex; flex-direction: column;">
        <div style="height: 15%; display: flex; justify-content: space-between; padding-top: 20px">
            <div style="width: 25%;">

            </div>
            <div style="width: 50%; text-align: center;">
                <div class="p-5">
                    <h2 style="font-size: 1.5rem;">Look up at the stars and not down at your feet. Try to make sense of what you see, and wonder about what makes the universe exist. Be curious.</h2>
                    <br>
                    <p>Stephen Hawking</p>
                </div>
            </div>
            <div style="width: 25%;">

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
    </script>
@endforeach
</body>
</html>
