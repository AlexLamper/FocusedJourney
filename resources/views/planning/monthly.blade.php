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

        .box {
            padding: 20px;
            border: 1px solid #dbdbdb;
            border-radius: 5px;
            margin: 0 auto;
        }

        .planner {
            display: grid;
            grid-template-columns: auto 1fr; /* Sidebar for time slots and main section for tasks */
            gap: 10px;
        }

        .time-slot {
            width: 100px;
            display: inline-block;
        }

        .task-container {
            display: grid;
            grid-template-columns: repeat(24, 1fr); /* 24 columns for 24 hours */
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .form-container {
            padding: 20px;
            border-radius: 5px;
            margin: 0 auto;
        }

        .form-container .field {
            margin-bottom: 1.5rem;
        }

        .menu-list li a {
            color: #333;
        }


        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        a{
            background-color: transparent;
            text-decoration: none;
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
            background-color: white;
            border-radius: 5px;
        }

        .timeslot{
            padding: 20px;
            background-color: #f9f9f9;
            border: solid 1px gray;
        }

        .task-list {
            list-style: none;
            padding: 0;
        }

        .task-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0; /* Remove padding */
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box; /* Include padding and border in the element's total width */
            border: none; /* Remove border */
        }

        .task-content {
            flex-grow: 1;
        }

        .task-name {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .task-description {
            color: #666;
            font-size: 0.9em;
            display: block;
        }

        .task-actions {
            margin-left: 10px;
        }

        .delete-btn {
            background-color: #ad2d36;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #bd222c;
        }

        /* Styles for task cards */
        .task-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        /* Styles for task content */
        .task-content {
            flex-grow: 1;
        }
        /* Styles for task actions */
        .task-actions {
            display: flex;
            align-items: center;
        }

        /* Styles for delete button */
        .delete-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .button {
            margin: 0 10px;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .button:hover {
            background-color: #ff7f6e;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .button-group {
            margin-bottom: 50px;
        }

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    @section('content')
        <section class="section">
            <div class="container">
                <h1 class="title">Monthly Planner</h1>
                <div class="button-group">
                    <a href="{{ route('planning.daily') }}" class="button">Daily</a>
                    <a href="{{ route('planning.weekly') }}" class="button">Weekly</a>
                    <a href="{{ route('planning.monthly') }}" class="button">Monthly</a>
                    <a href="{{ route('planning.yearly') }}" class="button">Yearly</a>
                </div>
                <div class="columns">
                    <div class="column is-8">
                        <!-- Sidebar for time slots -->
                        <div class="menu">
                            <p class="menu-label">Time Slots</p>
                            <ul class="menu-list">
                                TEST
                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <div>
                            <p class="menu-label">Monthly tasks</p>
                            <!-- Task containers -->
                            <ul class="task-list mb-4" id="sortable-list">
                                <p>test</p>
                            </ul>
                            <a href="/tasks/create"><button class="button-style" style="background-color: #ff7f6e;">Add a new task</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-app-layout>
@include('components.footer')

</body>
</html>
