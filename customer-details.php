<?php
$conn = new mysqli("localhost", "root", "", "thewearhouse");
if ($conn->connect_error) die("DB Error");

$id       = $_GET['id'] ?? 0;
$size     = $_GET['size'] ?? 'N/A';
$quantity = $_GET['qty'] ?? 1;

$res = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $res->fetch_assoc();

if (!$product) {
    die("Product not found");
}

$total = $product['price'] * $quantity;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout | The Wear House</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto bg-white p-6 mt-10 rounded shadow">

<h2 class="text-2xl font-bold mb-4">Checkout</h2>

<!-- PRODUCT SUMMARY -->
<div class="mb-6 border p-4 rounded bg-gray-50 space-y-2">
    <p><strong>Product:</strong> <?= $product['name'] ?></p>
    <p><strong>Price:</strong> ₹<?= number_format($product['price'],2) ?></p>
    <p><strong>Size:</strong> <?= htmlspecialchars($size) ?></p>
    <p><strong>Quantity:</strong> <?= $quantity ?></p>
    <p class="text-lg font-semibold">
        <strong>Total:</strong> ₹<?= number_format($total,2) ?>
    </p>
</div>

<form method="POST" action="order-success.php" class="space-y-4">

    <!-- Hidden Values -->
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <input type="hidden" name="size" value="<?= $size ?>">
    <input type="hidden" name="quantity" value="<?= $quantity ?>">
    <input type="hidden" name="total_price" value="<?= $total ?>">

    <input required name="name" placeholder="Full Name"
           class="w-full border px-4 py-2 rounded">

    <input required name="phone" placeholder="Phone Number"
           class="w-full border px-4 py-2 rounded">

    <input required name="email" placeholder="Email"
           class="w-full border px-4 py-2 rounded">

    <textarea required name="address" placeholder="Full Address"
              class="w-full border px-4 py-2 rounded"></textarea>

    <input required name="city" placeholder="City"
           class="w-full border px-4 py-2 rounded">

    <input required name="pincode" placeholder="Pincode"
           class="w-full border px-4 py-2 rounded">

    <button class="w-full bg-green-600 text-white py-3 rounded text-lg">
        Place Order
    </button>

</form>

</div>

</body>
</html>
