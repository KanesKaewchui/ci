<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Item Details</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <?php if (!empty($item)) : ?>
                <div class="flex flex-col md:flex-row">
                    <img src="<?php echo $item['image_url']; ?>" alt="Item Image" class="w-full md:w-1/3 h-auto mb-4 md:mb-0 rounded">
                    <div class="md:ml-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-4"><?php echo $item['name']; ?></h1>
                        <p class="text-lg text-gray-700 mb-4"><?php echo $item['description']; ?></p>
                        <p class="text-lg text-gray-700 mb-4">Seller: <?php echo $item['seller']; ?></p>
                        <p class="text-lg text-gray-700 mb-4">Price: $<?php echo $item['price']; ?></p>
                        <p class="text-lg text-gray-700 mb-4">Total Items: <span id="total-items"><?php echo $item['total_items']; ?></span></p>
                        <p class="text-lg text-gray-700 mb-4">Promotion Price: $<?php echo $item['promotion_price']; ?></p>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="buyItem()">
                            Buy Now
                        </button>
                    </div>
                </div>
            <?php else : ?>
                <p class="text-center text-gray-700">Item not found</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function buyItem() {

            let totalItemsElement = document.getElementById('total-items');
            let totalItems = parseInt(totalItemsElement.textContent);
            if (totalItems > 0) {
                Swal.fire({
                    title: 'Confirm Purchase',
                    text: 'Are you sure you want to purchase this item?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Buy it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        totalItems--;
                        totalItemsElement.textContent = totalItems;


                        Swal.fire({
                            icon: 'success',
                            title: 'Purchase Successful',
                            text: 'You have successfully purchased the item!',
                        });
                    }
                });
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Out of Stock',
                    text: 'This item is currently out of stock!',
                });
            }
        }
    </script>



</body>

</html>