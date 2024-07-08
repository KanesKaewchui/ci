<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>login</title>
</head>

<body class="bg-gray-100">
    <!-- navber -->
    <nav class="bg-gray-900 shadow-md py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <!-- logo -->
                    <div>
                        <a href="<?php echo site_url('marketplace/index'); ?>" class="flex items-center py-4 px-2">
                            <img src="/favicon.ico" alt="" srcset="">
                        </a>
                    </div>
                    <!-- navber links -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="<?php echo site_url('marketplace/promotion'); ?>" class="py-4 px-2 text-white hover:text-white">Promotion</a>
                        <a href="<?php echo site_url('marketplace/category'); ?>" class="py-4 px-2 text-white hover:text-white">Category</a>
                        <a href="<?php echo site_url('marketplace/trending'); ?>" class="py-4 px-2 text-white hover:text-white">Trending</a>
                    </div>
                </div>
                <!-- Register & login button -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo site_url('marketplace/register'); ?>" class="py-2 px-4 text-white ">Register</a>
                    <a href="<?php echo site_url('marketplace/login'); ?>" class="py-2 px-4 text-white ">Login</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class=" w-6 h-6 text-gray-500 hover:text-gray-600" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
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
        <h1 class="text-lg font-bold text-gray-900 mb-6">Promotion</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php if (!empty($items)) : ?>
                <?php foreach ($items as $item) : ?>
                    <div class="text-center shadow-lg p-4 bg-white rounded-lg">
                        <a href="<?php echo site_url('marketplace/itemdetails/' . $item->id); ?>">
                            <img src="<?php echo $item->image_url; ?>" alt="<?php echo $item->name; ?>" class="w-full h-auto mb-4 rounded">
                            <h1 class="text-lg font-bold text-gray-900 mb-6"><?php echo $item->name; ?></h1>
                            <p class="text-base text-gray-700"><?php echo $item->description; ?></p>
                            <span class="text-gray-900 font-bold">$<?php echo $item->promotion_price; ?></span>
                            <span class="text-gray-600 line-through">$<?php echo $item->price; ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-gray-700">No promotion items found.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-lg font-bold text-gray-900 mb-6">Trending</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php if (!empty($items)) : ?>
                <?php foreach ($items as $item) : ?>
                    <div class="text-center shadow-lg p-4 bg-white rounded-lg">
                        <a href="<?php echo site_url('marketplace/itemdetails/' . $item->id); ?>">
                            <img src="<?php echo $item->image_url; ?>" alt="<?php echo $item->name; ?>" class="w-full h-auto mb-4 rounded">
                            <h1 class="text-lg font-bold text-gray-900 mb-6"><?php echo $item->name; ?></h1>
                            <p class="text-base text-gray-700"><?php echo $item->description; ?></p>
                            <span class="text-gray-900 font-bold">$<?php echo $item->promotion_price; ?></span>
                            <span class="text-gray-600 line-through">$<?php echo $item->price; ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-gray-700">No promotion items found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Script mobile menu -->
    <script>
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <!-- Script login  -->
    <script>
        function login() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': ''
                    },
                    body: `username=${username}&password=${password}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.token) {
                        Swal.fire({
                            title: 'succeed',
                            text: 'Login successful!',
                            icon: 'success',
                            confirmButtonText: 'agree'
                        });
                    } else {
                        Swal.fire({
                            title: 'error',
                            text: 'username or password is not correct',
                            icon: 'error',
                            confirmButtonText: 'agree'
                        });
                    }
                });
        }
    </script>
</body>

</html>