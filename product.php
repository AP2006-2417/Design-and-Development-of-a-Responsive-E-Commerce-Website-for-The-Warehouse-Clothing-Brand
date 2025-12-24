<?php
// ================= DATABASE CONNECTION =================
$conn = new mysqli("localhost", "root", "", "thewearhouse");
if ($conn->connect_error) {
    die("Database connection failed");
}

// ================= INITIALIZE VARIABLES =================
$product = null;
$relatedProducts = [];

// ================= GET PRODUCT ID =================
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// ================= FETCH PRODUCT =================
if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $product = $res->fetch_assoc();

        // ================= FETCH RELATED PRODUCTS =================
        $stmt2 = $conn->prepare(
            "SELECT * FROM products WHERE category = ? AND id != ? LIMIT 4"
        );
        $stmt2->bind_param("si", $product['category'], $id);
        $stmt2->execute();
        $relRes = $stmt2->get_result();

        if ($relRes->num_rows > 0) {
            $relatedProducts = $relRes->fetch_all(MYSQLI_ASSOC);
        }
    }
}

// ================= PRODUCT NOT FOUND =================
if (!$product) {
    echo "<h2 style='text-align:center;margin-top:50px'>Product not found</h2>";
    echo "<p style='text-align:center'><a href='shop.php'>Back to shop</a></p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $products['name'] ?> - ThreadVogue</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="components/navbar.js"></script>
    <script src="components/footer.js"></script>
</head>
<body class="bg-gray-50">
    <custom-navbar></custom-navbar>
    
    <main class="container mx-auto px-4 py-8">
        <!-- Product Details -->
        <div class="flex flex-col md:flex-row gap-8 mb-16">
            <!-- Product Images -->
            <div class="md:w-1/2">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
                    <img src="<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>" class="w-full h-auto object-cover">
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="bg-white rounded shadow-sm overflow-hidden cursor-pointer border-2 border-indigo-500">
                        <img src="<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>" class="w-full h-20 object-cover">
                    </div>
                    <div class="bg-white rounded shadow-sm overflow-hidden cursor-pointer hover:border-indigo-300 border-2 border-transparent">
                        <img src="http://static.photos/fashion/200x200/1" alt="Alternative view" class="w-full h-20 object-cover">
                    </div>
                    <div class="bg-white rounded shadow-sm overflow-hidden cursor-pointer hover:border-indigo-300 border-2 border-transparent">
                        <img src="http://static.photos/fashion/200x200/2" alt="Alternative view" class="w-full h-20 object-cover">
                    </div>
                    <div class="bg-white rounded shadow-sm overflow-hidden cursor-pointer hover:border-indigo-300 border-2 border-transparent">
                        <img src="http://static.photos/fashion/200x200/3" alt="Alternative view" class="w-full h-20 object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="md:w-1/2">
                <?php if ($product['is_new']): ?>
                    <span class="inline-block bg-indigo-600 text-white text-xs px-2 py-1 rounded mb-2">New Arrival</span>
                <?php endif; ?>
                <h1 class="text-3xl font-bold mb-2"><?= $product['name'] ?></h1>
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 mr-2">
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                    </div>
                    <span class="text-gray-600 text-sm">(24 reviews)</span>
                </div>
                
                <p class="text-2xl font-semibold text-gray-800 mb-6">₹<?= number_format($product['price'], 2) ?></p>
                
                <p class="text-gray-700 mb-6"><?= $product['description'] ?></p>
                
                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Color</h3>
                    <div class="flex space-x-2">
                        <button class="w-8 h-8 rounded-full bg-blue-600 border-2 border-blue-800"></button>
                        <button class="w-8 h-8 rounded-full bg-black border-2 border-gray-800"></button>
                        <button class="w-8 h-8 rounded-full bg-white border-2 border-gray-300"></button>
                        <button class="w-8 h-8 rounded-full bg-red-600 border-2 border-transparent hover:border-red-800"></button>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Size</h3>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 focus:bg-indigo-100 focus:border-indigo-500">XS</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 focus:bg-indigo-100 focus:border-indigo-500">S</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 focus:bg-indigo-100 focus:border-indigo-500">M</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 focus:bg-indigo-100 focus:border-indigo-500">L</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 focus:bg-indigo-100 focus:border-indigo-500">XL</button>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 mb-8">
                    <div class="flex items-center border border-gray-300 rounded">
                        <button class="px-3 py-1 text-xl">-</button>
                        <span class="px-4 py-1 border-x border-gray-300">1</span>
                        <button class="px-3 py-1 text-xl">+</button>
                    </div>
                    <button class="add-to-cart flex-1 bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition duration-300" data-id="<?= $product['id'] ?>">
                        Add to Cart
                    </button>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <div class="flex items-center mb-2">
                        <i data-feather="truck" class="w-5 h-5 text-gray-500 mr-2"></i>
                        <span class="text-gray-600">Free shipping on orders over $50</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <i data-feather="rotate-ccw" class="w-5 h-5 text-gray-500 mr-2"></i>
                        <span class="text-gray-600">Free returns within 30 days</span>
                    </div>
                    <div class="flex items-center">
                        <i data-feather="shield" class="w-5 h-5 text-gray-500 mr-2"></i>
                        <span class="text-gray-600">2-year warranty</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Tabs -->
        <div class="mb-16">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <button class="tab-button active py-4 px-6 border-b-2 font-medium text-sm border-indigo-500 text-indigo-600">Description</button>
                    <button class="tab-button py-4 px-6 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Details</button>
                    <button class="tab-button py-4 px-6 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Reviews</button>
                    <button class="tab-button py-4 px-6 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Shipping</button>
                </nav>
            </div>
            
            <div class="tab-content py-6">
                <div class="tab-pane active">
                    <h3 class="text-xl font-semibold mb-4">Product Description</h3>
                    <p class="text-gray-700 mb-4"><?= $product['description'] ?></p>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <?php if (count($relatedProducts) > 0): ?>
            <div class="mb-16">
                <h2 class="text-2xl font-bold mb-6">You May Also Like</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <?php foreach ($relatedProducts as $related): ?>
                        <div class="product-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                            <a href="product.php?id=<?= $related['id'] ?>">
                                <img src="<?= $related['image_url'] ?>" alt="<?= $related['name'] ?>" class="w-full h-64 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold mb-1"><?= $related['name'] ?></h3>
                                    <p class="text-gray-600">$<?= number_format($related['price'], 2) ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <custom-footer></custom-footer>

    <script>
        feather.replace();
        
        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-button').forEach(btn => {
                    btn.classList.remove('active', 'border-indigo-500', 'text-indigo-600');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                
                // Add active class to clicked button
                this.classList.add('active', 'border-indigo-500', 'text-indigo-600');
                this.classList.remove('border-transparent', 'text-gray-500');
                
                // In a real app, you would switch the tab content here
            });
        });
        
        // Quantity selector
        const quantityDisplay = document.querySelector('.flex.items-center.border.border-gray-300.rounded span');
        const minusButton = document.querySelector('.flex.items-center.border.border-gray-300.rounded button:first-child');
        const plusButton = document.querySelector('.flex.items-center.border.border-gray-300.rounded button:last-child');
        
        minusButton.addEventListener('click', function() {
            let quantity = parseInt(quantityDisplay.textContent);
            if (quantity > 1) {
                quantityDisplay.textContent = quantity - 1;
            }
        });
        
        plusButton.addEventListener('click', function() {
            let quantity = parseInt(quantityDisplay.textContent);
            quantityDisplay.textContent = quantity + 1;
        });
        
        // Add to cart functionality
        document.querySelector('.add-to-cart').addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantity = parseInt(quantityDisplay.textContent);
            
            // In a real app, you would send this to your server
            alert(`Added ${quantity} of product ${productId} to cart!`);
            
            // Update cart count in navbar
            const cartCounts = document.querySelectorAll('.cart-count');
            cartCounts.forEach(count => {
                const current = parseInt(count.textContent);
                count.textContent = current + quantity;
            });
        });
    </script>
</body>
</html>
