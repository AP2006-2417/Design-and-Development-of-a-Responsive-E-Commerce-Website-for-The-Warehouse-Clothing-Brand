<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wear House - Premium Fashion</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body class="bg-gray-50">


    <main class="container mx-auto px-4 py-8">

        <!-- Hero Section -->
        <section class="hero bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-8 text-white mb-12">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">The Wear House</h1>
                <p class="text-xl mb-6">Where timeless style meets everyday comfort</p>
                <a href="shop.php" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300 inline-block">Shop Now</a>
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold mb-6">Shop by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                $categories = [
                    ['name'=>'Men', 'image'=>'photos/mens.webp', 'link'=>'shop.php?category=men'],
                    ['name'=>'Women', 'image'=>'photos/womens.jpg', 'link'=>'shop.php?category=women'],
                    ['name'=>'Kids', 'image'=>'photos/kids.jpg', 'link'=>'shop.php?category=kids'],
                    ['name'=>'Accessories', 'image'=>'photos/accessories.jpg', 'link'=>'shop.php?category=accessories']
                ];

                foreach ($categories as $cat) {
                    echo '
                    <a href="'.$cat['link'].'" class="category-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="'.$cat['image'].'" alt="'.$cat['name'].'" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">'.$cat['name'].' Collection</h3>
                        </div>
                    </a>';
                }
                ?>
            </div>
        </section>

        <!-- New Arrivals -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">New Arrivals</h2>
                <a href="shop.php?new=true" class="text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php
                $newArrivals = [
                    ['id'=>7, 'name'=>'Premium Denim Jacket', 'price'=>1799.00, 'image'=>'photos/denim4.jpg'],
                    ['id'=>39, 'name'=>'Silk Summer Dress', 'price'=>999.00, 'image'=>'photos/wsilk1.jpg'],
                    ['id'=>3, 'name'=>'Classic White Shirt', 'price'=>899.00, 'image'=>'photos/kshirt1.jpg'],
                    ['id'=>4, 'name'=>'Leather Crossbody Bag', 'price'=>1599.00, 'image'=>'photos/wbag1.jpg']
                ];

                foreach ($newArrivals as $item) {
                    echo '
                    <div class="product-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <img src="'.$item['image'].'" alt="'.$item['name'].'" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-1">'.$item['name'].'</h3>
                            <p class="text-gray-600 mb-2">₹'.number_format($item['price'], 2).'</p>
                            <a href="product.php?id='.$item['id'].'" class="block text-center bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition duration-300">View Details</a>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-12 mt-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div>
                <h3 class="font-bold text-xl mb-4">The Wear House</h3>
                <p>Premium fashion for men, women, and kids. Timeless style meets everyday comfort.</p>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Quick Links</h4>
                <ul>
                    <li><a href="index.php" class="hover:text-white">Home</a></li>
                    <li><a href="shop.php" class="hover:text-white">Shop</a></li>
                    <li><a href="about.php" class="hover:text-white">About Us</a></li>
                    <li><a href="contact.php" class="hover:text-white">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Customer Service</h4>
                <ul>
                    <li><a href="Shipping&return.php" class="hover:text-white">Shipping & Returns</a></li>
                    <li><a href="FAQs.php" class="hover:text-white">FAQs</a></li>
                    <li><a href="size-guide.php" class="hover:text-white">Size Guide</a></li>
                </ul>
            </div>
            
            <div>
    <h4 class="font-semibold mb-4">Follow Us</h4>
    <div class="flex space-x-4">
        <a href="https://www.facebook.com/YourPage" target="_blank" class="hover:text-white">
            <i data-feather="facebook"></i>
        </a>
        <a href="https://www.instagram.com/YourProfile" target="_blank" class="hover:text-white">
            <i data-feather="instagram"></i>
        </a>
        <a href="https://twitter.com/YourProfile" target="_blank" class="hover:text-white">
            <i data-feather="twitter"></i>
        </a>
        <a href="https://www.youtube.com/YourChannel" target="_blank" class="hover:text-white">
            <i data-feather="youtube"></i>
        </a>
    </div>
</div>

        </div>
        <div class="text-center mt-8 text-gray-400">
            &copy; <?= date('Y') ?> The Wear House. All rights reserved.
        </div>
    </footer>

    <script>
        feather.replace();
    </script>
</body>
</html>
