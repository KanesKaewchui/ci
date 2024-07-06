<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md mt-16">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
        <form action="/Movie_test/login" method="POST" class="space-y-4">
            <div class="flex justify-between items-center">
                <label for="username" class="block font-medium">Username:</label>
                <input type="text" name="username" id="username" required class="border border-gray-300 p-2 rounded w-64">
            </div>
            <div class="flex justify-between items-center">
                <label for="password" class="block font-medium">Password:</label>
                <input type="password" name="password" id="password" required class="border border-gray-300 p-2 rounded w-64">
            </div>
            <div class="flex justify-center">
                <input type="submit" name="submit" id="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            </div>
        </form>
    </div>
</body>

</html>