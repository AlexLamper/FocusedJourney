<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Focused Journey</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        .div-wrapper img {
            position: absolute;
            left: 0;
            bottom: 0;
        }
    </style>
</head>
<body class="antialiased" style="min-height: 100vh; background-size: cover; background-position: center;">
<x-app-layout>
    <section class="section" style="min-height: 93vh; background-image: url('/images/background3.jpg'); display: flex; flex-direction: column; justify-content: space-between;">
        <div style="background-color: white">
            @if($focusSession = $focusSessions->last())
            <h1 class="title">Focus Session for {{ $focusSession->duration }} minutes.</h1>
                <div>
                    <div id="countdown_{{ $focusSession->id }}" style="font-weight: bold; font-size: 2.3rem;"></div>
                </div>
            @else
                <div class="notification is-info">
                    <p>No focus sessions found.</p>
                </div>
            @endif
        </div>

        <!-- Image placed at the bottom -->
{{--        <img src="/images/creature2.png" alt="Animated GIF" style="align-self: flex-start;">--}}
    </section>
</x-app-layout>

@foreach ($focusSessions as $focusSession)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var countdown_{{ $focusSession->id }} = {{ $focusSession->duration }} * 60; // Convert minutes to seconds
            var countdownInterval_{{ $focusSession->id }} = setInterval(function() {
                var minutes = Math.floor(countdown_{{ $focusSession->id }} / 60);
                var seconds = countdown_{{ $focusSession->id }} % 60;
                var countdownElement = document.getElementById("countdown_{{ $focusSession->id }}");
                if (countdownElement) {
                    countdownElement.textContent = minutes + "m " + seconds + "s ";
                }
                countdown_{{ $focusSession->id }}--;
                if (countdown_{{ $focusSession->id }} < 0) {
                    clearInterval(countdownInterval_{{ $focusSession->id }});
                    if (countdownElement) {
                        countdownElement.textContent = "Focus session ended";
                    }
                }
            }, 1000);
        });
    </script>
@endforeach
</body>
</html>
