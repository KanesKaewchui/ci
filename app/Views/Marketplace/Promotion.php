<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Promotion</title>
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
                        <a href="<?php echo site_url('marketplace/promotion');?>" class="py-4 px-2 text-gray-700 hover:text-gray-900">Promotion</a>
                        <a href="<?php echo site_url('marketplace/category');?>" class="py-4 px-2 text-gray-700 hover:text-gray-900">Category</a>
                        <a href="<?php echo site_url('marketplace/trending');?>" class="py-4 px-2 text-gray-700 hover:text-gray-900">Trending</a>
                    </div>
                </div>
                <!-- Register & Login buttons -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo site_url('marketplace/register'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Register</a>
                    <a href="<?php echo site_url('marketplace/login'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Login</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class=" w-6 h-6 text-gray-500 hover:text-gray-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
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
        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200">Category</a>
        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200">Trending</a>
        <div class="flex justify-center space-x-4 mt-4">
            <a href="<?php echo site_url('marketplace/register'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Register</a>
            <a href="<?php echo site_url('marketplace/login'); ?>" class="py-2 px-4 text-gray-700 border rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">Login</a>
        </div>
    </div>

    <!-- Promotion Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Current Promotions</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Promotion Card 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Promotion Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Promotion Title 1</h2>
                    <p class="text-gray-600 mt-2">Description of the promotion goes here. It should be brief and to the point.</p>
                    <div class="mt-4">
                        <span class="text-gray-900 font-bold">$10.00</span>
                        <span class="text-gray-600 line-through">$20.00</span>
                    </div>
                    <a href="#" class="block mt-4 py-2 px-4 bg-blue-500 text-white text-center rounded hover:bg-blue-600">Shop Now</a>
                </div>
            </div>

            <!-- Promotion Card 2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Promotion Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Promotion Title 2</h2>
                    <p class="text-gray-600 mt-2">Description of the promotion goes here. It should be brief and to the point.</p>
                    <div class="mt-4">
                        <span class="text-gray-900 font-bold">$15.00</span>
                        <span class="text-gray-600 line-through">$30.00</span>
                    </div>
                    <a href="#" class="block mt-4 py-2 px-4 bg-blue-500 text-white text-center rounded hover:bg-blue-600">Shop Now</a>
                </div>
            </div>

            <!-- Promotion Card 3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Promotion Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Promotion Title 3</h2>
                    <p class="text-gray-600 mt-2">Description of the promotion goes here. It should be brief and to the point.</p>
                    <div class="mt-4">
                        <span class="text-gray-900 font-bold">$20.00</span>
                        <span class="text-gray-600 line-through">$40.00</span>
                    </div>
                    <a href="#" class="block mt-4 py-2 px-4 bg-blue-500 text-white text-center rounded hover:bg-blue-600">Shop Now</a>
                </div>
            </div>
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
