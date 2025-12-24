<?php
session_start();
$conn = new mysqli("localhost", "root", "", "thewearhouse");
if ($conn->connect_error) die("DB Error");

$session_id = session_id();
$product_id = intval($_GET['id'] ?? 0);

if ($product_id == 0) {
    header("Location: shop.php");
    exit;
}

// Check if product already in cart
$check = $conn->query("
    SELECT id, quantity FROM cart 
    WHERE session_id='$session_id' AND product_id=$product_id
");

if ($check->num_rows > 0) {
    // Update quantity
    $row = $check->fetch_assoc();
    $newQty = $row['quantity'] + 1;
    $conn->query("UPDATE cart SET quantity=$newQty WHERE id={$row['id']}");
} else {
    // Insert new product
    $conn->query("
        INSERT INTO cart (session_id, product_id, quantity)
        VALUES ('$session_id', $product_id, 1)
    ");
}

header("Location: cart.php");
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name'] ?> | The Wear House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-6xl mx-auto p-6 bg-white mt-8 rounded shadow">

<!-- PRODUCT SECTION -->
<div class="grid md:grid-cols-2 gap-8">

    <!-- IMAGE -->
    <img src="<?= $product['image_url'] ?>"
         class="w-full h-[450px] object-cover rounded">

    <!-- DETAILS -->
    <div>
        <h1 class="text-3xl font-bold mb-2"><?= $product['name'] ?></h1>

        <p class="text-gray-600 mb-4"><?= $product['description'] ?></p>

        <p class="text-2xl font-semibold text-indigo-600 mb-4">
            ₹<?= number_format($product['price'],2) ?>
        </p>

        <!-- SIZES -->
        <form method="GET" action="customer-details.php" class="mt-4">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label class="block font-semibold mb-2">Select Size</label>
    <select name="size" required class="border px-4 py-2 rounded mb-4">
        <option value="">Select Size</option>
        <option value="S">Small (S)</option>
        <option value="M">Medium (M)</option>
        <option value="L">Large (L)</option>
        <option value="XL">Extra Large (XL)</option>
    </select>
    <!-- QUANTITY -->
        <label class="block font-semibold">Quantity</label>
    <input type="number" name="qty" value="1" min="1"
           class="border px-4 py-2 rounded w-full mb-4">
</form>

        <!-- BUY BUTTON -->
        <a href="customer-details.php?id=<?= $product['id'] ?>"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded text-lg inline-block">
           Buy Now
        </a>
    </div>
</div>

<!-- PRODUCT HIGHLIGHTS -->
<div class="mt-10">
    <h2 class="text-xl font-bold mb-4">Product Highlights</h2>
    <ul class="list-disc ml-6 text-gray-700 space-y-2">
        <li>Premium quality material</li>
        <li>Comfortable for daily wear</li>
        <li>Trendy & modern design</li>
        <li>Easy to wash & maintain</li>
        <li>Perfect for casual & party wear</li>
    </ul>
</div>

<!-- SPECIFICATIONS -->
<div class="mt-10">
    <h2 class="text-xl font-bold mb-4">Specifications</h2>
    <table class="w-full border text-sm">
        <tr class="border">
            <td class="p-2 font-semibold">Category</td>
            <td class="p-2"><?= ucfirst($product['category']) ?></td>
        </tr>
        <tr class="border">
            <td class="p-2 font-semibold">Material</td>
            <td class="p-2">Premium Fabric</td>
        </tr>
        <tr class="border">
            <td class="p-2 font-semibold">Fit</td>
            <td class="p-2">Regular Fit</td>
        </tr>
        <tr class="border">
            <td class="p-2 font-semibold">Care</td>
            <td class="p-2">Machine Wash</td>
        </tr>
    </table>
</div>

<!-- REVIEWS -->
<div class="mt-10">
    <h2 class="text-xl font-bold mb-4">Customer Reviews</h2>

    <div class="space-y-4">

        <div class="border p-4 rounded">
            <p class="font-semibold">Rahul Sharma ⭐⭐⭐⭐⭐</p>
            <p class="text-gray-600 text-sm">
                Excellent quality! Fits perfectly and looks premium.
            </p>
        </div>

        <div class="border p-4 rounded">
            <p class="font-semibold">Amit Patel ⭐⭐⭐⭐</p>
            <p class="text-gray-600 text-sm">
                Very comfortable, worth the price.
            </p>
        </div>

        <div class="border p-4 rounded">
            <p class="font-semibold">Sneha Mehta ⭐⭐⭐⭐⭐</p>
            <p class="text-gray-600 text-sm">
                Loved the design and fabric quality.
            </p>
        </div>

    </div>
</div>

</div>

</body>
</html>
