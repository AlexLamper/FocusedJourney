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

        .box {
            padding: 20px;
            border: 1px solid #dbdbdb;
            border-radius: 5px;
        }

        .planner {
            display: grid;
            grid-template-columns: auto 1fr; /* Sidebar for time slots and main section for tasks */
            gap: 10px;
        }

        .time-slot {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
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
        }

        .form-container .field {
            margin-bottom: 1.5rem;
        }

        .menu-list li a {
            color: #333;
        }

        .menu-list li a:hover {
            color: #3273dc;
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
    <section class="section">
        <div class="container">
            <h1 class="title">Daily Planner</h1>
            <div class="columns">
                <div class="column is-2">
                    <!-- Sidebar for time slots -->
                    <div class="menu">
                        <p class="menu-label">Time Slots</p>
                        <ul class="menu-list">
                            <li><a href="#" class="time-slot">00:00</a></li>
                            <li><a href="#" class="time-slot">01:00</a></li>
                            <li><a href="#" class="time-slot">02:00</a></li>
                            <li><a href="#" class="time-slot">03:00</a></li>
                            <li><a href="#" class="time-slot">04:00</a></li>
                            <li><a href="#" class="time-slot">05:00</a></li>
                            <li><a href="#" class="time-slot">06:00</a></li>
                            <li><a href="#" class="time-slot">07:00</a></li>
                            <li><a href="#" class="time-slot">08:00</a></li>
                            <li><a href="#" class="time-slot">09:00</a></li>
                            <li><a href="#" class="time-slot">10:00</a></li>
                            <li><a href="#" class="time-slot">11:00</a></li>
                            <li><a href="#" class="time-slot">12:00</a></li>
                            <li><a href="#" class="time-slot">13:00</a></li>
                            <li><a href="#" class="time-slot">14:00</a></li>
                            <li><a href="#" class="time-slot">15:00</a></li>
                            <li><a href="#" class="time-slot">16:00</a></li>
                            <li><a href="#" class="time-slot">17:00</a></li>
                            <li><a href="#" class="time-slot">18:00</a></li>
                            <li><a href="#" class="time-slot">19:00</a></li>
                            <li><a href="#" class="time-slot">20:00</a></li>
                            <li><a href="#" class="time-slot">21:00</a></li>
                            <li><a href="#" class="time-slot">22:00</a></li>
                            <li><a href="#" class="time-slot">23:00</a></li>
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

                        <!-- Daily planner grid -->
                        <div class="planner">
                            <!-- Task containers -->
                            <div class="task-container">
                                <ul class="task-list mb-4" id="sortable-list">
                                    @foreach ($tasks as $task)
                                        <li class="task-card" data-task-id="{{ $task->id }}">
                                            <div class="task-content">
                                                <span class="task-name">{{ $task->name }}</span>
                                                <span class="task-description">{{ $task->description }}</span>
                                                <span class="task-timestamp">{{ $task->timestamp }}</span>
                                            </div>
                                            <div class="task-actions">
                                                <label for="priority">
                                                    <select name="priority" class="priority-dropdown" data-task-id="{{ $task->id }}">
                                                        <option value="Low" {{ $task->priority === 'Low' ? 'selected' : '' }}>Low</option>
                                                        <option value="Medium" {{ $task->priority === 'Medium' ? 'selected' : '' }}>Medium</option>
                                                        <option value="High" {{ $task->priority === 'High' ? 'selected' : '' }}>High</option>
                                                    </select>
                                                </label>
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-btn">Delete</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
@include('components.footer')

</body>
</html>
