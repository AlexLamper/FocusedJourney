<!DOCTYPE html>
<html>
<head>
    <title>Show Habit</title>
</head>
<body>
<h1>{{ $habit->name }}</h1>
<p>{{ $habit->description }}</p>
<p>Habit Type: {{ $habit->habit_type }}</p>
<p>Days Tracked: {{ $habit->days_tracked }}</p>
</body>
</html>
