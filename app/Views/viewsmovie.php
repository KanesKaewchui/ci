<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 m-0 p-0">
    <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="space-x-4 ml-auto">
            <a href="/Movie_test/login_form" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Login</a>
            <a href="/Movie_test/register_form" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Register</a>
        </div>
    </nav>

    <div class="max-w-lg mx-auto bg-white p-8 mt-5 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Movie List</h2>
        <ul class="space-y-4">
        <?php if (!empty($movies)) : ?>
            <?php foreach ($movies as $movie) : ?>
                <li class="bg-gray-200 p-4 rounded-lg shadow-md mb-4">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold"><?= $movie->movie_name ?></h3>
                            <p><strong>Genre:</strong> <?= $movie->genre ?></p>
                            <p><strong>Duration:</strong> <?= $movie->movie_duration ?> minutes</p>
                            <p><strong>Start Time:</strong> <?= $movie->round_time ?></p>
                            <p><strong>Price:</strong> ฿ <?= $movie->price ?></p>
                            <p><strong>Available Seats:</strong> <?= $movie->available_seats ?></p>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="/Movie_test/book_form/<?= $movie->round_id ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Book</a>
                    </div>
                </li>

            <?php endforeach; ?>
        <?php else : ?>
        <li class="text-red-500">No movies found.</li>
        <?php endif; ?>
        </ul>
    </div>
</body>

</html>
