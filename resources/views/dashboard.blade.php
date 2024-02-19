<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Focused Journey</title>
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
            <h1 class="title">Focus Sessions</h1>
            <div class="content shadow-lg border">
{{--                @foreach($focusSessions as $focusSession)--}}
{{--                    <div class="box">--}}
{{--                        <h2 class="subtitle">Focus Session</h2>--}}
{{--                        <p><strong>Start Time:</strong> {{ $focusSession->start_time }}</p>--}}
{{--                        <p><strong>Duration:</strong> {{ $focusSession->duration }} minutes</p>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </section>
</x-app-layout>
</body>
</html>
