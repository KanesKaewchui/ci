<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="#" class="text-lg font-bold">Admin Panel</a>
            </div>
            <div>
                <a href="/admin/movies" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Movies</a>
                <a href="/admin/rounds" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Movie Rounds</a>
                <a href="/admin/users" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Users</a>
                <a href="/admin/bookings" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Bookings</a>
                <a href="/admin/reports" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Reports</a>
                <a href="/logout" class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded text-white">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto my-5">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
