<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planning | Focused Journey</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .title {
            margin-bottom: 1rem;
        }

        .input {
            width: 10rem;
            padding: 0.5rem;
            border: 2px solid #000;
            border-radius: 0.5rem;
            text-align: center;
            color: #000;
            background-color: #fff;
            outline: none;
            transition: border-color 0.3s;
        }

        .input:focus {
            border-color: #3182ce;
        }

        .button-style {
            padding: 0.5rem 1rem;
            background-color: #3182ce;
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .button-style:hover {
            background-color: #2765b0;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .button-style:focus {
            outline: none;
        }

        .message {
            font-size: 0.875rem;
            color: #666;
            margin-top: 1rem;
        }

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    @section('content')
        <section class="section">
            <div class="container flex flex-col items-center justify-center h-screen">
                <h1 class="title">Start a Focus Session</h1>
                <form action="{{ route('focus-sessions.store') }}" method="post" class="form" style="margin: 0; padding: 0;">
                    @csrf
                    <div class="field">
                        <label for="duration" class="label">Focus Duration (minutes)</label>
                        @auth
                            <div class="control">
                                <input type="number" name="duration" id="duration" class="input border border-b-2 border-[#303030]" style="max-width: 200px; border-radius: 5px;" required>
                            </div>
                        @endauth

                        @guest
                            <p>Please log in or register to start a focus session.</p>
                            <div class="control">
                                <input type="number" name="duration" id="duration" class="input border border-b-2 border-black" style="max-width: 200px;" required disabled>
                            </div>
                        @endguest
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="border-none p-3 rounded-md text-white" style="background-color: #ff7f6e;">Start Focus Session</button>
                        </div>
                    </div>
                </form>
                <p class="message">Get ready to boost your productivity!</p>
            </div>
        </section>
    @endsection
</x-app-layout>
@include('components.footer')

</body>
</html>
