<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks | Focused Journey</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /*Create Task Button */
        .button-style {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff; /* White background */
            color: #000; /* Black text */
            text-decoration: none;
            border: 1px solid #ccc; /* Slight border */
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow */
            transition: background-color 0.3s, color 0.3s, border-color 0.3s, box-shadow 0.3s; /* Smooth transitions */
        }

        .button-style:hover {
            background-color: #f0f0f0; /* Light gray background on hover */
            color: #333; /* Darker text on hover */
            border-color: #999; /* Darker border on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Larger shadow on hover */
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

        .empty-message {
            text-align: center;
            color: #888;
        }

        .task-list {
            list-style: none;
            padding: 0;
        }

        .task-card {
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
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

        /* Styles for header */
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Styles for tasks section */
        .tasks-section {
            width: 80%;
            margin: 0 auto;
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

        /* Styles for priority dropdown */
        .priority-dropdown {
            margin-right: 10px;
        }

        /* Styles for delete button */
        .delete-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    <!-- Hero Section -->
    <section class="hero section">
        <!-- Header -->
        <header class="mb-6">
            <h1 class="title">Task List</h1>
        </header>

        <!-- Tasks Section -->
        <section class="tasks-section">
            <ul class="task-list mb-4">
                @foreach ($tasks as $task)
                    <li class="task-card">
                        <div class="task-content">
                            <span class="task-name">{{ $task->name }}</span>
                            <span class="task-description">{{ $task->description }}</span>
                        </div>
                        <div class="task-actions">
                            <select class="priority-dropdown">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <button class="delete-btn" style="background-color: #ad2d36;">Delete</button>
                        </div>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('tasks.create') }}" class="button-style">Create a New Task</a>
        </section>
    </section>
</x-app-layout>
@include('components.footer')
</body>
</html>
