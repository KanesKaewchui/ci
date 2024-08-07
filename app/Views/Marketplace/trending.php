<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Trending</title>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <!-- Logo -->
                    <div>
                        <a href="<?php echo site_url('marketplace/index'); ?>" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-700 text-lg">Logo</span>
                        </a>
                    </div>
                    <!-- Navbar links -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="<?php echo site_url('marketplace/promotion'); ?>" class="py-4 px-2 text-gray-700 hover:text-gray-900">Promotion</a>
                        <a href="<?php echo site_url('marketplace/category'); ?>" class="py-4 px-2 text-gray-700 hover:text-gray-900">Category</a>
                        <a href="<?php echo site_url('marketplace/trending'); ?>" class="py-4 px-2 text-gray-700 hover:text-gray-900">Trending</a>
                    </div>
                </div>
                <!-- Register & login buttons -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo site_url('marketplace/register'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Register</a>
                    <a href="<?php echo site_url('marketplace/login'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Login</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden">
        <a href="<?php echo site_url('marketplace/promotion'); ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200">Promotion</a>
        <a href="<?php echo site_url('marketplace/category'); ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200">Category</a>
        <a href="<?php echo site_url('marketplace/trending'); ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200">Trending</a>
        <div class="flex justify-center space-x-4 mt-4">
            <a href="<?php echo site_url('marketplace/register'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Register</a>
            <a href="<?php echo site_url('marketplace/login'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Login</a>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Trending</h1>
            <p class="text-gray-700">Explore the most popular items</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Trending Item 1 -->
            <div class="text-center shadow-lg p-4 bg-white rounded-lg">
                <a href="#">
                    <img src="https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsUFJ5KBFZv668FFQwnfCcJmxDv9rhwIHZwqP3a-uGwz9Xv8F0j-qQrI3xiVLkrxVuZW-mJoWLMlhpWhFkc9M/360fx360f" alt="Trending Item 1" class="w-full h-auto mb-4 rounded">
                    <h2 class="text-lg font-bold text-gray-900 mb-2">Trending Item 1</h2>
                    <p class="text-gray-700">$29.99</p>
                </a>
            </div>
            <!-- Trending Item 2 -->
            <div class="text-center shadow-lg p-4 bg-white rounded-lg">
                <a href="#">
                    <img src="https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsUFJ5KBFZv668FFQwnfCcJmxDv9rhwIHZwqP3a-uGwz9Xv8F0j-qQrI3xiVLkrxVuZW-mJoWLMlhpWhFkc9M/360fx360f" alt="Trending Item 2" class="w-full h-auto mb-4 rounded">
                    <h2 class="text-lg font-bold text-gray-900 mb-2">Trending Item 2</h2>
                    <p class="text-gray-700">$39.99</p>
                </a>
            </div>
            <!-- Trending Item 3 -->
            <div class="text-center shadow-lg p-4 bg-white rounded-lg">
                <a href="#">
                    <img src="https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsUFJ5KBFZv668FFQwnfCcJmxDv9rhwIHZwqP3a-uGwz9Xv8F0j-qQrI3xiVLkrxVuZW-mJoWLMlhpWhFkc9M/360fx360f" alt="Trending Item 3" class="w-full h-auto mb-4 rounded">
                    <h2 class="text-lg font-bold text-gray-900 mb-2">Trending Item 3</h2>
                    <p class="text-gray-700">$49.99</p>
                </a>
            </div>
            <!-- Trending Item 4 -->
            <div class="text-center shadow-lg p-4 bg-white rounded-lg">
                <a href="#">
                    <img src="https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsUFJ5KBFZv668FFQwnfCcJmxDv9rhwIHZwqP3a-uGwz9Xv8F0j-qQrI3xiVLkrxVuZW-mJoWLMlhpWhFkc9M/360fx360f" alt="Trending Item 4" class="w-full h-auto mb-4 rounded">
                    <h2 class="text-lg font-bold text-gray-900 mb-2">Trending Item 4</h2>
                    <p class="text-gray-700">$59.99</p>
                </a>
            </div>
            <!-- Add more trending items as needed -->
        </div>
    </div>

    <script>
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>