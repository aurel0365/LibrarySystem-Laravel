<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
</head>
<body>
    <h1>Librarian Dashboard</h1>
    <p>Welcome, {{ $user->name }} ({{ $user->role }})</p>
    @if ($updateDue)
        <p style="color: red;">Reminder: It's time to update the library's collection!</p>
    @else
        <p>Your last collection update was on {{ $user->last_collection_update }}.</p>
    @endif
</body>
</html>
