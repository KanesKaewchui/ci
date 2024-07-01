<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Registration successful</strong>
        <span class="block sm:inline">
            <br>
            User ID: <?php echo $user_id; ?><br>
            Username: <?php echo $username; ?><br>
            Password: <?php echo $password; ?><br>
            Birthday: <?php echo $birthday; ?><br>
            Created Time: <?php echo $created_time; ?>
        </span>
        <br><br>
        <a href="/Movie_test">
            <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">HOME</button>
        </a>
    </div>
</body>
</html>
