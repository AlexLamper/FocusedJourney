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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .menu-list a {
            color: #3273dc;
        }

        .box {
            padding: 20px;
            border: 1px solid #dbdbdb;
            border-radius: 5px;
        }

        .media-content {
            margin-bottom: 10px;
        }

        .title {
            color: #4a4a4a;
        }

        .subtitle {
            color: #888;
        }

        .form-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container .field {
            margin-bottom: 1.5rem;
        }

        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .menu {
            margin-bottom: 1.5rem;
        }

        .menu-label {
            font-weight: bold;
        }

        .menu-list li a {
            color: #333;
        }

        .menu-list li a:hover {
            color: #3273dc;
        }

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    <section class="section">
        <div class="container">
            <h1 class="title">Daily Planner</h1>
            <div class="columns">
                <div class="column is-2">
                    <!-- Sidebar for time slots -->
                    <div class="menu">
                        <p class="menu-label">Time Slots</p>
                        <ul class="menu-list">
                            <li><a href="#">00:00</a></li>
                            <li><a href="#">01:00</a></li>
                            <li><a href="#">02:00</a></li>
                            <li><a href="#">03:00</a></li>
                            <li><a href="#">04:00</a></li>
                            <li><a href="#">05:00</a></li>
                            <li><a href="#">06:00</a></li>
                            <li><a href="#">07:00</a></li>
                            <li><a href="#">08:00</a></li>
                            <li><a href="#">09:00</a></li>
                            <li><a href="#">10:00</a></li>
                            <li><a href="#">11:00</a></li>
                            <li><a href="#">12:00</a></li>
                            <li><a href="#">13:00</a></li>
                            <li><a href="#">14:00</a></li>
                            <li><a href="#">15:00</a></li>
                            <li><a href="#">16:00</a></li>
                            <li><a href="#">17:00</a></li>
                            <li><a href="#">18:00</a></li>
                            <li><a href="#">19:00</a></li>
                            <li><a href="#">20:00</a></li>
                            <li><a href="#">21:00</a></li>
                            <li><a href="#">22:00</a></li>
                            <li><a href="#">23:00</a></li>
                        </ul>
                    </div>
                </div>
                <div class="column">
                    <!-- Main section for tasks/events -->
                    <div class="box">
                        <!-- Task creation form -->
                        <div class="form-container">
                            <h1 class="title">Create a Task</h1>
                            <form method="post">
                                @csrf
                                <div class="field">
                                    <label class="label" for="name">Task Name:</label>
                                    <div class="control">
                                        <input class="input" type="text" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label" for="description">Description:</label>
                                    <div class="control">
                                        <textarea class="textarea" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label" for="timestamp">Timestamp:</label>
                                    <div class="control">
                                        <input class="input" type="datetime-local" id="timestamp" name="timestamp" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label" for="priority">Priority:</label>
                                    <div class="control">
                                        <div class="select">
                                            <select id="priority" name="priority">
                                                <option value="Low">Low</option>
                                                <option value="Medium">Medium</option>
                                                <option value="High">High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Add Task</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End of task creation form -->

                        <!-- Existing tasks/events -->
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">09:00 - 10:00</p>
                                <p class="subtitle is-6">Task 1</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">10:00 - 11:00</p>
                                <p class="subtitle is-6">Task 2</p>
                            </div>
                        </div>
                        <!-- Add more tasks/events here -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
@include('components.footer')

</body>
</html>
