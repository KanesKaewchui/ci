<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form data</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#viewMoviesBtn').click(function() {
                $.ajax({
                    url: '/Movie_test/get_movie',
                    method: 'GET',
                    success: function(response) {
                        let movieList = '';
                        if (response.length > 0) {
                            response.forEach(function(movie) {
                                movieList += `
                                    <li class="bg-gray-200 p-4 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold">${movie.movie_name}</h3>
                                        <p><strong>Genre:</strong> ${movie.genre}</p>
                                        <p><strong>Duration:</strong> ${movie.movie_duration} minutes</p>
                                        <p><strong>Start Time:</strong> ${movie.movie_start_show_time}</p>
                                        <p><strong>Price:</strong> $${movie.price}</p>
                                    </li>`;
                            });
                        } else {
                            movieList = '<li class="text-red-500">No movies found.</li>';
                        }
                        $('#movieList').html(movieList);
                    },
                    error: function() {
                        $('#movieList').html('<li class="text-red-500">Error loading movies.</li>');
                    }
                });
            });
        });
    </script>
</head>

<body class="bg-gray-100 py-8 ">
    <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="space-x-4 ml-auto">
            <a href="/Movie_test/login_form" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Login</a>
            <a href="/Movie_test/register_form" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded text-white">Register</a>
        </div>
    </nav>

    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Movie List</h2>
        <ul class="space-y-4">
            <?php if (!empty($movies)) : ?>
                <?php foreach ($movies as $movie) : ?>
                    <li class="bg-gray-200 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-semibold"><?= $movie->movie_name ?></h3>
                        <p><strong>Genre:</strong> <?= $movie->genre ?></p>
                        <p><strong>Duration:</strong> <?= $movie->movie_duration ?> minutes</p>
                        <p><strong>Start Time:</strong> <?= $movie->movie_start_show_time ?></p>
                        <p><strong>Price:</strong> ฿ <?= $movie->price ?></p>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li class="text-red-500">No movies found.</li>
            <?php endif; ?>
        </ul>
    </div>

    <div id="error" class="text-center text-red-500 mt-4"></div>
</body>

</html>