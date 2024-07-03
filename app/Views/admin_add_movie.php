<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1 class="text-3xl font-bold mb-5">Add Movie</h1>
<form action="/admin/add_movie" method="post">
    <div class="mb-4">
        <label for="movie_name" class="block text-sm font-medium text-gray-700">Movie Name</label>
        <input type="text" name="movie_name" id="movie_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>
    <div class="mb-4">
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input type="text" name="genre" id="genre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>
    <div class="mb-4">
        <label for="movie_duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
        <input type="text" name="movie_duration" id="movie_duration" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Price (THB)</label>
        <input type="text" name="price" id="price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>
    <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Add</button>
    </div>
</form>
<?= $this->endSection() ?>