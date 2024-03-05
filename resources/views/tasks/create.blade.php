<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About - Laravel</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        body{
            font-family: 'Inter', Helvetica Neue, Helvetica, Arial, sans-serif;
        }
        .form-container {
            max-width: 1000px;
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style input and textarea */
        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style the button */
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Hover effect for the button */
        .form-container button:hover {
            background-color: #0056b3;
        }

        /*Create Task Button */
        .button-style {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff7f6e;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s, border-color 0.3s, box-shadow 0.3s;
        }

        .button-style:hover {
            background-color: #f0f0f0;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    <!-- Hero Section -->
    <section class="hero is-fullheight section">
        <div class="form-container">
            <h1 class="title">Create a task</h1>
            <form action="/tasks" method="post">
                @csrf
                <div>
                    <label for="name">Task Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description"></textarea>
                </div>
                <div style="margin-bottom: 15px">
                    <label for="timestamp">Timestamp:</label>
                    <input type="datetime-local" id="timestamp" name="timestamp" required>
                </div>
                <div style="margin-bottom: 15px">
                    <label for="priority">Priority:</label>
                    <select id="priority" name="priority">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <button type="submit" class="button-style">Add Task</button>
            </form>
        </div>
    </section>
</x-app-layout>
@include('components.footer')
</body>
</html>
