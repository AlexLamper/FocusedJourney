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
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
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

        .planning-section {
            background-color: #f0f0f0;
            padding: 50px 0;
        }

        .button-group {
            margin-bottom: 50px; /* Add spacing between button group and content */
        }

        .planning-content {
            display: flex;
            justify-content: center;
        }

        .timeline {
            width: 800px;
            margin: 0 auto;
        }

        .event {
            position: relative;
            padding-left: 20px;
            margin-bottom: 30px;
        }

        .event::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            background-color: #007bff;
            border-radius: 50%;
        }

        .event-date {
            font-size: 18px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .event-description {
            font-size: 16px;
            color: #333;
            margin-left: 15px;
        }

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    @section('content')
        <section class="section">
            <div class="container">
                <h1 class="title">Planning Overview</h1>
                <div class="button-group">
                    <a href="{{ route('planning') }}" class="button">Planning</a>
                    <a href="{{ route('planning.daily') }}" class="button">Daily</a>
                    <a href="{{ route('planning.weekly') }}" class="button">Weekly</a>
                    <a href="{{ route('planning.monthly') }}" class="button">Monthly</a>
                    <a href="{{ route('planning.yearly') }}" class="button">Yearly</a>
                </div>
                <div class="content planning-content">
                    {{--                    <div class="timeline">--}}
                    {{--                        <div class="event">--}}
                    {{--                            <div class="event-date">March 5, 2024</div>--}}
                    {{--                            <div class="event-description">Meeting with client</div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="event">--}}
                    {{--                            <div class="event-date">March 8, 2024</div>--}}
                    {{--                            <div class="event-description">Project deadline</div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="event">--}}
                    {{--                            <div class="event-date">March 12, 2024</div>--}}
                    {{--                            <div class="event-description">Team brainstorming session</div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
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
