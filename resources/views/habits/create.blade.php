<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks | Focused Journey</title>
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
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /*Create Task Button */
        .button-style {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff7f6e;
            color: white;
            font-weight: lighter;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s, border-color 0.3s, box-shadow 0.3s;
        }

        .button-style:hover {
            background-color: #ed7261;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }


    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    @section('content')
        <div class="container">
            <h1 class="title">Create a new habit</h1>
            <form action="{{ route('habits.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label" for="name">Name</label>
                    <div class="control">
                        <input class="input" type="text" id="name" name="name" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>
                    <div class="control">
                        <textarea class="textarea" id="description" name="description" required></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="habit_type">Habit Type</label>
                    <div class="control">
                        <div class="select">
                            <select id="habit_type" name="habit_type" required>
                                <option value="21">21</option>
                                <option value="66">66</option>
                                <option value="90">90</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="days_tracked">Days Tracked</label>
                    <div class="control">
                        <input class="input" type="number" id="days_tracked" name="days_tracked" required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Create Habit</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>
@include('components.footer')

</body>
</html>
