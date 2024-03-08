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

        .form-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
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
    @section('content')
        <section class="section">
            <div class="form-container">
                <h1 class="title">Your Todos</h1>
                <ul class="task-list mb-4" id="sortable-list">
                    @foreach ($todos as $todo)
                        <li class="task-card" data-task-id="{{ $todo->id }}">
                            <div class="task-content">
                                <span class="task-name">
                                    <label>
                                        <input type="checkbox" class="toggle-status" data-todo-id="{{ $todo->id }}">
                                    </label>
                                    {{ $todo->name }}
                                </span>
                                <span class="task-description">{{ $todo->description }}</span>
                                <span class="task-due-date">Due Date: {{ date('Y-m-d H:i', strtotime($todo->due_date)) }}</span>
                            </div>
                            <div class="task-actions">
                                <label for="priority">
                                    <select name="priority" class="priority-dropdown" data-task-id="{{ $todo->id }}">
                                        <option value="Low" {{ $todo->priority === 'Low' ? 'selected' : '' }}>Low</option>
                                        <option value="Medium" {{ $todo->priority === 'Medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="High" {{ $todo->priority === 'High' ? 'selected' : '' }}>High</option>
                                    </select>
                                </label>
                                <form action="{{ route('todo.destroy', $todo) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" style="background-color: #ef4444">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('todo.create') }}" class="button-style">Create a new todo</a>
            </div>
        </section>
    @endsection
</x-app-layout>
@include('components.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to fetch todo statuses and set checkboxes
        function fetchTodoStatuses() {
            $.ajax({
                url: '/todos/statuses',
                method: 'GET',
                success: function(response) {
                    response.forEach(function(todo) {
                        var checkbox = $('.toggle-status[data-todo-id="' + todo.id + '"]');
                        if (todo.status === 'completed') {
                            checkbox.prop('checked', true);
                        } else {
                            checkbox.prop('checked', false);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle error if needed
                }
            });
        }

        // Fetch todo statuses and set checkboxes when the page loads
        fetchTodoStatuses();

        // Event listener for checkbox change
        $('.toggle-status').on('change', function() {
            var todoId = $(this).data('todo-id');
            var isChecked = $(this).is(':checked');

            // Send AJAX request to toggle the status
            $.ajax({
                url: '/todos/' + todoId + '/toggle-status',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: isChecked ? 'completed' : 'pending'
                },
                success: function(response) {
                    console.log(response.message);
                    // Optionally update UI if needed
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle error if needed
                }
            });
        });
    });
</script>

<script>
    // Function to handle priority change
    function handlePriorityChange(todoId, newPriority) {
        fetch(`/todo/${todoId}`, {
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
                console.log('Todo priority updated successfully:', data);
            })
            .catch(error => {
                console.error('There was a problem updating todo priority:', error);
            });
    }

    // Add event listener to priority dropdowns
    document.querySelectorAll('.priority-dropdown').forEach(dropdown => {
        dropdown.addEventListener('change', event => {
            const todoId = event.target.dataset.taskId;
            const newPriority = event.target.value;
            handlePriorityChange(todoId, newPriority);
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

            // Send an AJAX request to the server to update the todo order
            fetch('/todo/update-order', {
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
                    console.log('Todo order updated successfully:', data);
                })
                .catch(error => {
                    console.error('There was a problem updating todo order:', error);
                });
        }
    });
</script>

</body>
</html>
