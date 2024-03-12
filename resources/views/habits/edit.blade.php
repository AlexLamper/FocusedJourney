<form action="{{ route('habits.update', $habit) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Form fields for editing a habit -->
</form>
