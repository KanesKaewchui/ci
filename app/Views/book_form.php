<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Movie Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-8">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Book Ticket for <?= $round->movie_name ?></h2>
        <p><strong>Genre:</strong> <?= $round->genre ?></p>
        <p><strong>Duration:</strong> <?= $round->movie_duration ?> minutes</p>
        <p><strong>Start Time:</strong> <?= $round->movie_start_show_time ?></p>
        <p><strong>Price:</strong> ฿<?= $round->price ?></p>
        <p><strong>Available Seats:</strong> <?= $round->available_seats ?></p>

        <form action="/Movie_test/book_ticket" method="post" class="mt-4">
            <input type="hidden" name="round_id" value="<?= $round->round_id ?>">
            <label for="seats" class="block text-sm font-medium text-gray-700">Number of seats:</label>
            <input type="number" id="seats" name="seats" min="1" max="<?= $round->available_seats ?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <button type="submit" class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Book</button>
        </form>
    </div>
</body>

</html>