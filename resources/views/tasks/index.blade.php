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

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /*Create Task Button */
        .button-style {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e2e8f0;
            color: black;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s, border-color 0.3s, box-shadow 0.3s;
            font-weight: normal;
        }

        .button-style:hover {
            background-color: #a0aec0;
            color: black;
            border-color: #999;
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

        .form-container {
            width: 80%;
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

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    <section class="section">
        <div class="form-container">
            <h1 class="title">Task List</h1>
            <ul class="task-list mb-4" id="sortable-list">
                @foreach ($tasks as $task)
                    <li class="task-card" data-task-id="{{ $task->id }}">
                        <div class="task-content">
                            <span class="task-name">{{ $task->name }}</span>
                            <span class="task-description">{{ $task->description }}</span>
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
            <a href="/tasks/create" class="button-style">Create a new task</a>
        </div>
    </section>
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

</body>
</html>
