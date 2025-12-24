<?php
session_start();
$conn = new mysqli("localhost", "root", "", "thewearhouse");
if ($conn->connect_error) die("DB Error");

$session_id = session_id();

$sql = "
SELECT cart.id AS cart_id, products.*, cart.quantity
FROM cart
JOIN products ON cart.product_id = products.id
WHERE cart.session_id = '$session_id'
";

$res = $conn->query($sql);
$items = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
.cart-card:hover {
    transform: scale(1.02);
    transition: 0.3s;
}
</style>
</head>

<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">

<h1 class="text-3xl font-bold mb-6">🛒 My Shopping Cart</h1>

<?php if ($items): ?>
<div class="bg-white rounded shadow overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-gray-200">
<tr>
    <th class="p-3">Product</th>
    <th class="p-3">Price</th>
    <th class="p-3">Qty</th>
    <th class="p-3">Subtotal</th>
    <th class="p-3">Action</th>
</tr>
</thead>


<tbody>
<?php foreach ($items as $item): 
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
?>
<tr class="border-b cart-card">
    <td class="p-3 flex items-center gap-3">
        <img src="<?= $item['image_url'] ?>" class="w-16 h-16 rounded object-cover">
        <?= $item['name'] ?>
    </td>

    <td class="p-3">₹<?= number_format($item['price'],2) ?></td>
    <td class="p-3"><?= $item['quantity'] ?></td>
    <td class="p-3 font-semibold">₹<?= number_format($subtotal,2) ?></td>

    <td class="p-3 space-y-2">
        <!-- BUY NOW -->
        <a href="customer-details.php?cart_id=<?= $item['cart_id'] ?>"
           class="block bg-green-600 text-white text-center px-3 py-1 rounded hover:bg-green-700">
           Buy Now
        </a>

        <!-- REMOVE -->
        <a href="remove-cart.php?id=<?= $item['cart_id'] ?>"
           onclick="return confirm('Remove this item?')"
           class="block bg-red-600 text-white text-center px-3 py-1 rounded hover:bg-red-700">
           Cancel
        </a>
    </td>
</tr>

<?php endforeach; ?>
</tbody>
</table>
</div>

<div class="text-right mt-6">
    <p class="text-xl font-bold">Total: ₹<?= number_format($total,2) ?></p>
    <a href="customer-details.php"
   class="inline-block mt-4 bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
   Checkout All
</a>
</div>

<?php else: ?>
<p class="text-gray-500 text-center">Your cart is empty 🛍️</p>
<?php endif; ?>

</div>
</body>
</html>
