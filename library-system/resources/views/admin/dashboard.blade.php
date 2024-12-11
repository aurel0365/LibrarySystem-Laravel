<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Manage Librarians</h2>
    <form action="/admin/add-librarian" method="POST">
        @csrf
        <input type="text" name="librarian_name" placeholder="Librarian Name" required>
        <button type="submit">Add Librarian</button>
    </form>
    <form action="/admin/remove-librarian" method="POST">
        @csrf
        <input type="text" name="librarian_id" placeholder="Librarian ID to Remove" required>
        <button type="submit">Remove Librarian</button>
    </form>
</body>
</html>
