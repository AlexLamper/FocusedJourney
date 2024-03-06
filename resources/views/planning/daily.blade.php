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

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    @section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Daily Planner</h1>
            <div class="columns">
                <div class="column is-8">
                    <!-- Sidebar for time slots -->
                    <div class="menu">
                        <p class="menu-label">Time Slots</p>
                        <ul class="menu-list">
                            @foreach ($timeslots as $timeslot)
                                <li class="timeslot" data-time="{{ $timeslot }}">
                                    {{ $timeslot }}
                                    <ul class="task-list">
                                        @foreach ($tasks as $task)
                                            @php
                                                // Extract the hour part from the task timestamp
                                                $taskHour = date('H', strtotime($task->timestamp));
                                                // Extract the hour part from the timeslot
                                                $timeslotHour = explode(':', $timeslot)[0];
                                            @endphp
                                            @if ($taskHour == $timeslotHour)
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
                                                            <button type="submit" class="delete-btn" style="background-color: #ef4444; margin-left: 10px">Delete</button>
                                                        </form>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="column">
                    <div>
                        <p class="menu-label">Todays Focus</p>
                        {{--                        <form action="{{ route('focus.store') }}" method="POST">--}}
                        {{--                            @csrf--}}
                        <div class="field">
                            <label class="label" for="todays-focus">Enter today's focus:</label>
                            <div class="control">
                                <input class="input" type="text" id="todays-focus" name="todays_focus">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button-style" style="background-color: #ff7f6e;">Save</button>
                            </div>
                        </div>
                        {{--                        </form>--}}
                    </div>
                    <div style="height: 20px; border-top: solid 1px gray; margin-top: 20px">

                    </div>
                    <div>
                        <p class="menu-label">Daily tasks</p>
                        <!-- Task containers -->
                        <ul class="task-list mb-4" id="sortable-list">
                            @foreach ($tasks as $task)
                                <li class="task-card" data-task-id="{{ $task->id }}" style="background-color: #f9f9f9;">
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
                                            <button type="submit" class="delete-btn" style="background-color: #ef4444; margin-left: 10px">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
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

<script>
    // Function to handle priority change
    function handlePriorityChange(taskId, newPriority) {
        fetch(`/tasks/${taskId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ priority: newPriority })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Task priority updated successfully:', data);
            })
            .catch(error => {
                console.error('There was a problem updating task priority:', error);
            });
    }

    // Add event listener to priority dropdowns
    document.querySelectorAll('.priority-dropdown').forEach(dropdown => {
        dropdown.addEventListener('change', event => {
            const taskId = event.target.dataset.taskId;
            const newPriority = event.target.value;
            handlePriorityChange(taskId, newPriority);
        });
    });
</script>

<script>
    const sortableList = new Sortable(document.getElementById('sortable-list'), {
        animation: 150,
        handle: '.task-card',
        onEnd: function (evt) {
            const taskElements = document.querySelectorAll('.task-card');
            const newOrder = [];
            taskElements.forEach((task, index) => {
                newOrder.push({
                    id: task.dataset.taskId,
                    order: index + 1 // Index starts from 0, so add 1 to start from 1
                });
            });

            // Send an AJAX request to the server to update the task order
            fetch('/tasks/update-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(newOrder)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Task order updated successfully:', data);
                })
                .catch(error => {
                    console.error('There was a problem updating task order:', error);
                });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tasks = document.querySelectorAll('.task-card');

        tasks.forEach(task => {
            const timestamp = task.querySelector('.task-timestamp').textContent;
            const timeslot = document.querySelector(`.timeslot[data-time="${timestamp}"]`);
            if (timeslot) {
                timeslot.insertAdjacentElement('afterend', task);
            }
        });
    });

</script>

</body>
</html>
