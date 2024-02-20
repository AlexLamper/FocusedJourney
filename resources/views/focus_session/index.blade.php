<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Focused Journey</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        /* Add custom styles here */
    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    <section class="section">
        <div class="container">
            <h1 class="title">Focus Session</h1>
            <div class="content shadow-lg border p-6">
                <div class="content shadow-lg border p-6">
                    @foreach ($focusSessions as $focusSession)
                        <h2>Focus Duration: {{ $focusSession->duration }}</h2>
                        <!-- Countdown Timer -->
                        <div id="countdown_{{ $focusSession->id }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

@push('scripts')
    @foreach ($focusSessions as $focusSession)
        <script>
            var countdown_{{ $focusSession->id }} = {{ $focusSession->duration }} * 60; // Convert minutes to seconds
            var countdownInterval_{{ $focusSession->id }} = setInterval(function() {
                var minutes = Math.floor(countdown_{{ $focusSession->id }} / 60);
                var seconds = countdown_{{ $focusSession->id }} % 60;
                document.getElementById("countdown_{{ $focusSession->id }}").innerText = minutes + "m " + seconds + "s ";
                countdown_{{ $focusSession->id }}--;
                if (countdown_{{ $focusSession->id }} < 0) {
                    clearInterval(countdownInterval_{{ $focusSession->id }});
                    document.getElementById("countdown_{{ $focusSession->id }}").innerText = "Focus session ended";
                }
            }, 1000);
        </script>
    @endforeach
@endpush
</body>
</html>
