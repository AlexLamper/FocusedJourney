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

        /* Styling for Show Habit Section */
        .show-habit {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .show-habit h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .show-habit p {
            margin-bottom: 10px;
        }

    </style>
</head>
<body class="antialiased bg-white">
<x-app-layout>
    @section('content')
        <section class="section">
            <div class="container">
                <h1 class="title">Show Habit</h1>
                <div class="show-habit" style="padding: 20px; border: 1px solid #dbdbdb; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h1 style="font-size: 24px; margin-bottom: 10px;">{{ $habit->name }}</h1>
                    <p style="margin-bottom: 10px;">{{ $habit->description }}</p>
                    <p style="margin-bottom: 10px;"><strong>Habit Type:</strong> {{ $habit->habit_type }}</p>
                    <p style="margin-bottom: 10px;"><strong>Days Tracked:</strong> {{ $habit->days_tracked }}</p>
                    <br>
                    <p>
                        Overview:
                        <br><br>
                        Habit Name: Clearly state the name of the habit.
                        Description: Provide a brief description or purpose of the habit.
                        Habit Type: Specify the category or type of habit it falls under (e.g., health, productivity, personal development).
                        Tracking and Progress:
                        <br><br>
                        Days Tracked: Show the number of days the habit has been tracked.
                        Progress Chart: Visualize the habit's progress over time using graphs or charts.
                        Streak: Highlight any streaks or consistency in maintaining the habit.
                        Goal and Targets:
                        <br><br>
                        Goal: Specify the desired outcome or goal associated with the habit.
                        Targets: Break down the goal into smaller, achievable targets or milestones.
                        Tips and Guidance:
                        <br><br>
                        Tips for Success: Provide helpful tips or strategies for effectively practicing the habit.
                        Guidance: Offer guidance on how to overcome common challenges or obstacles associated with the habit.
                        Resources and References:
                        <br><br>
                        Recommended Reading: Suggest books, articles, or resources related to the habit for further learning.
                        External Links: Provide links to relevant websites, blogs, or communities where users can find more information or support.
                        Reflection and Feedback:
                        <br><br>
                        Reflection Questions: Encourage users to reflect on their experiences with the habit by posing thought-provoking questions.
                        Feedback Form: Allow users to provide feedback or share their thoughts on the habit page.
                        Social Sharing and Community:
                        <br><br>
                        Share Buttons: Include buttons for users to share the habit page on social media platforms.
                        Community Links: Connect users to online communities or forums where they can engage with others practicing the same habit.
                        Customization and Personalization:
                        <br><br>
                        Customization Options: Allow users to customize their habit page by adding notes, setting reminders, or adjusting preferences.
                        Personal Insights: Provide personalized insights or recommendations based on the user's progress and habits.
                    </p>
                </div>
            </div>
        </section>
    @endsection
</x-app-layout>
@include('components.footer')
</body>
</html>
