<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-8">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Book Ticket</h2>
        <form action="/Movie_test/book_ticket" method="post">
            <input type="hidden" name="round_id" value="<?= $round->round_id ?>">
            <label for="seats">Number of seats:</label>
            <input type="number" id="seats" name="seats" min="1" max="<?= $round->available_seats ?>" required class="block w-full mt-2 p-2 border rounded">
            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Book</button>
        </form>
    </div>
</body>

</html>