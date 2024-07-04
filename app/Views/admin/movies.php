<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1 class="text-3xl font-bold mb-5">Manage Movies</h1>
<a href="/admin/add_movie" class="mb-4 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Add Movie</a>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Loop through movies here -->
    <?php foreach ($movies as $movie) : ?>
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold"><?= $movie->movie_name ?></h2>
            <p><strong>Genre:</strong> <?= $movie->genre ?></p>
            <p><strong>Duration:</strong> <?= $movie->movie_duration ?> minutes</p>
            <p><strong>Price:</strong> ฿ <?= $movie->price ?></p>
            <a href="/admin/edit_movie/<?= $movie->movie_id ?>" class="mt-2 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
            <a href="/admin/delete_movie/<?= $movie->movie_id ?>" class="mt-2 inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</a>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>