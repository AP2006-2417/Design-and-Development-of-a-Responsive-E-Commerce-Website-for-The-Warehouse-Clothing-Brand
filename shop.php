<?php
// ===================== DATABASE CONNECTION =====================
$conn = new mysqli("localhost", "root", "", "thewearhouse");
if ($conn->connect_error) {
    die("Database connection failed");
}

// ===================== CREATE TABLE =====================
$conn->query("
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    description TEXT,
    price DECIMAL(10,2),
    category VARCHAR(50),
    image_url VARCHAR(255),
    is_new TINYINT(1)
)");

// ===================== INSERT DEMO PRODUCTS (ONLY ONCE) =====================
$check = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc();
if ($check['total'] == 0) {
    $conn->query("INSERT INTO products (name, description, price, category, image_url, is_new) VALUES
    ('Men Cotton T-Shirt', 'Premium cotton t-shirt for men', 799, 'men', 'photos/cotton1.jpg', 1),
    ('Men Cotton T-Shirt', 'Premium cotton t-shirt for men', 999, 'men', 'photos/cotton2.jpg', 0),
    ('Men Cotton T-Shirt', 'Premium cotton t-shirt for men', 699, 'men', 'photos/cotton3.jpg', 1),
    ('Men Denim Jacket', 'Stylish denim jacket', 2499, 'men', 'photos/denim1.jpg', 1),
    ('Men Denim Jacket', 'Stylish denim jacket', 1499, 'men', 'photos/denim2.jpg', 0),
    ('Men Denim Jacket', 'Stylish denim jacket', 1599, 'men', 'photos/denim3.jpg', 0),
    ('Men Denim Jacket', 'Stylish denim jacket', 1799, 'men', 'photos/denim4.jpg', 1),
    ('Men Denim Jacket', 'Stylish denim jacket', 2399, 'men', 'photos/denim5.jpg', 1),
    ('Men Hoodie','Stylish men hoodie',1599,'men','photos/mhoodie1.jpg',0),
    ('Men Hoodie','Stylish men hoodie',1999,'men','photos/mhoodie2.jpg',0),
    ('Men Hoodie','Stylish men hoodie',2099,'men','photos/mhoodie3.jpg',1),
    ('Men pant-Tshirt','Comfortable pant-Tshirt',2199,'men','photos/mpair1.jpg',0),
    ('Men pant-Tshirt','Comfortable pant-Tshirt',2599,'men','photos/mpair2.jpg',1),
    ('Men pant-Tshirt','Comfortable pant-Tshirt',1199,'men','photos/mpair3.jpg',0),
    ('Men Pant','Comfortable pant',799,'Men','photos/mpants1.jpg',1),
    ('Men Pant','Comfortable pant',699,'Men','photos/mpants2.jpg',0),
    ('Men Pant','Comfortable pant',999,'Men','photos/mpants3.jpg',0),
    ('Men Shirt','Stylish shirt',899,'Men','photos/mshirt1.jpg',0),
    ('Men Shirt','Stylish shirt',1299,'Men','photos/mshirt2.jpg',0),
    ('Men Shirt','Stylish shirt',1899,'Men','photos/mshirt3.jpg',1),

    ('Women Floral Dress', 'Beautiful floral dress', 1099, 'women', 'photos/floral1.jpg', 0),
    ('Women Floral Dress', 'Beautiful floral dress', 1399, 'women', 'photos/floral2.jpg', 1),
    ('Women Floral Dress', 'Beautiful floral dress', 1799, 'women', 'photos/floral3.jpg', 0),
    ('Women Casual Top', 'Comfortable casual top', 999, 'women', 'photos/top1.jpg', 1),
    ('Women Casual Top', 'Comfortable casual top', 1999, 'women', 'photos/top2.jpg', 0),
    ('Women Casual Top', 'Comfortable casual top', 1499, 'women', 'photos/top3.jpg', 0),
    ('Women shirt', 'Comfortable shirt',1500,'women','photos/wshirt1.jpg',1),
    ('Women shirt', 'Comfortable shirt',1999,'women','photos/wshirt2.jpg',0),
    ('Women shirt', 'Comfortable shirt',2500,'women','photos/wshirt3.jpg',0),
    ('Women pant-T-shirt', 'Comfortable pant-T-shirt',2000,'women','photos/wpair1.jpg',1),
    ('Women pant-T-shirt', 'Comfortable pant-T-shirt',3000,'women','photos/wpair2.jpg',1),
    ('Women pant-T-shirt', 'Comfortable pant-T-shirt',5000,'women','photos/wpair3.jpg',1),
    ('Women jogger-pant','Comfortable pant',1200,'women','photos/wjoggers1.jpg',0),
    ('Women jogger-pant','Comfortable pant',1200,'women','photos/wjoggers2.jpg',1),
    ('Women jogger-pant','Comfortable pant',1200,'women','photos/wjoggers3.jpg',0),
    ('Women Hoodie','Comfortable Hoodie',1199,'women','photos/whoodie1.jpg',1),
    ('Women Hoodie','Comfortable Hoodie',2499,'women','photos/whoodie2.jpg',1),
    ('Women Hoodie','Comfortable Hoodie',1399,'women','photos/whoodie3.jpg',1),
    ('silk summer dress','Comfortable',999,'women','photos/wsilk1.jpg',0),
    ('silk summer dress','Comfortable',2999,'women','photos/wsilk2.jpg',0),
    ('silk summer dress','Comfortable',1599,'women','photos/wsilk3.jpg',0),

    ('Cute Dangri','Stylish',700,'kids','photos/kdangri1.jpg',1),
    ('Cute Dangri','Stylish',900,'kids','photos/kdangri2.jpg',0),
    ('Cute Dangri','Stylish',1000,'kids','photos/kdangri3.jpg',1),
    ('Cute Short Frok','Stylish',1200,'kids','photos/kfrok1.jpg',0),
    ('Cute Short Frok','Stylish',1300,'kids','photos/kfrok2.jpg',0),
    ('Cute Short Frok','Stylish',1500,'kids','photos/kfrok3.jpg',0),
    ('Cute Short Frok','Stylish',1700,'kids','photos/kids1.jpg',0),
    ('Cute Short Frok','Stylish',2000,'kids','photos/kids2.jpg',1),
    ('Cute Short Frok','Stylish',1400,'kids','photos/kids3.jpg',1),
    ('Stylish Hoodie','Beautiful Hoodie',1000,'kids','photos/khoodie1.jpg',0),
    ('Stylish Hoodie','Beautiful Hoodie',700,'kids','photos/khoodie2.jpg',0),
    ('Stylish Hoodie','Beautiful Hoodie',500,'kids','photos/khoodie3.jpg',1),
    ('Stylish Hoodie','Beautiful Hoodie',1800,'kids','photos/khoodie4.jpg',0),
    ('Stylish Hoodie','Beautiful Hoodie',1200,'kids','photos/khoodie5.jpg',0),
    ('Stylish Hoodie','Beautiful Hoodie',1100,'kids','photos/khoodie6.jpg',0),
    ('Cute pair','Cutest Pair for Kids',1300,'kids','photos/kpair1.jpg',1),
    ('Cute pair','Cutest Pair for Kids',1500,'kids','photos/kpair2.jpg',1),
    ('Cute pair','Cutest Pair for Kids',1100,'kids','photos/kpair3.jpg',0),
    ('Cute pair','Cutest Pair for Kids',1000,'kids','photos/kpair4.jpg',0),
    ('Cute pair','Cutest Pair for Kids',1400,'kids','photos/kpair5.jpg',0),
    ('Cute pair','Cutest Pair for Kids',1100,'kids','photos/kpair6.jpg',0),
    ('Cute pair','Cutest Pair for Kids',1600,'kids','photos/kpair7.jpg',1),
    ('Cute pair','Cutest Pair for Kids',900,'kids','photos/kpair8.jpg',0),
    ('Cute pair','Cutest Pair for Kids',1000,'kids','photos/kpair9.jpg',0),
    ('Cute pair','Cutest Pair for Kids',800,'kids','photos/kpair10.jpg',0),
    ('Cutest shirt','Beautiful and Sweet',899,'kids','photos/kshirt1.jpg',1),
    ('Cutest shirt','Beautiful and Sweet',499,'kids','photos/kshirt2.jpg',0),
    ('Cutest shirt','Beautiful and Sweet',699,'kids','photos/kshirt3.jpg',0),
    ('Cutest shirt','Beautiful and Sweet',799,'kids','photos/kshirt4.jpg',0),
    ('Cutest shirt','Beautiful and Sweet',899,'kids','photos/kshirt5.jpg',0),
    ('Cutest shirt','Beautiful and Sweet',900,'kids','photos/kshirt6.jpg',1),
    ('Cutest T-shirt','Beautiful and Sweet',1500,'kids','photos/ktshirt1.jpg',0),
    ('premium winter Clothe','Comfortable winter wear for daily use',3000,'kids','photos/kwinter1.jpg',1),
    ('premium winter Clothe','Comfortable winter wear for daily use',2000,'kids','photos/kwinter2.jpg',1),
    ('premium winter Clothe','Comfortable winter wear for daily use',1500,'kids','photos/kwinter3.jpg',1),
    ('premium winter Clothe','Comfortable winter wear for daily use',1700,'kids','photos/kwinter4.jpg',0),
    ('premium winter Clothe','Comfortable winter wear for daily use',1900,'kids','photos/kwinter5.jpg',0),
    ('premium winter Clothe','Comfortable winter wear for daily use',1799,'kids','photos/kwinter6.jpg',0),
    ('premium winter Clothe','Comfortable winter wear for daily use',1599,'kids','photos/kwinter7.jpg',1),
    ('premium winter Clothe','Comfortable winter wear for daily use',999,'kids','photos/kwinter8.jpg',0),
    ('premium winter Clothe','Comfortable winter wear for daily use',2499,'kids','photos/kwinter9.jpg',1),


    ('Men Leather Bracelet', 'Stylish braided leather bracelet', 699, 'accessories', 'photos/Amen1.jpg', 0),
    ('Men Analog Watch','Premium men’s analog watch with leather strap and chronograph design',2999,'accessories','photos/Amen2.jpg',1),
    ('Black Cross Necklace', 'Stylish black cross pendant chain', 899, 'accessories', 'photos/Amen3.jpg', 1),
    ('Men Bracelet Set', 'Stylish black bracelet combo set', 999, 'accessories', 'photos/Amen4.jpg', 0),
    ('Men Designer Bracelet', 'Elegant black bracelet with engraved metal plate', 1199, 'accessories', 'photos/Amen5.jpg', 1),
    ('Men Square Sunglasses', 'Trendy square sunglasses with metal frame', 1499, 'accessories', 'photos/Amen6.jpg', 1),
    ('Men Gift Combo Set', 'Luxury gift set with watch, perfume and wallet', 4999, 'accessories', 'photos/Amen7.jpg', 0),
    ('Gold Finish Bracelet', 'Stylish gold finish bracelet for men', 1299, 'accessories', 'photos/Amen8.jpg', 0),
    ('Men Braided Bracelet','Premium braided bracelet with gold-tone accents',1499,'accessories',
        'photos/Amen9.jpg',1),
    ('Men Bar Pendant Necklace','Minimal stainless steel bar pendant necklace',999,'accessories','photos/Amen10.jpg',
        0),
    ('Men Double Chain Necklace','Trendy double-layer silver chain necklace',1299,'accessories','photos/Amen11.jpg' , 1),
    ('Gold Cuban Link Bracelet','Luxury gold-finish cuban link bracelet',1799,'accessories','photos/Amen12.jpg',
        1),

    ('Aesthetic Hair Accessories Bouquet','Neutral-toned aesthetic hair accessories gift bouquet',1000,'accessories','photos/Awomen1.jpg',0),
    ('Neutral Hair Claw Clip', 'Minimal matte finish claw clip for everyday elegance',299,'accessories','photos/Awomen2.jpg',0),
    ('Butterfly Necklace', 'Layered butterfly pendant necklace',899,'accessories','photos/Awomen3.jpg',1),
    ('Black Clover Set', 'Elegant clover necklace, bracelet & ring set',1299,'accessories','photos/Awomen4.jpg',1),
    ('Mini Handbag','Stylish mini handbag with premium finish',1499,'accessories','photos/Awomen5.jpg',1),
    ('Mini Shoulder Bag', 'Bags', 1599, 'accessories','photos/Awomen6.jpg',0),
    ('Neutral Tone Scrunchie Set - 3 Pack','Elevate your everyday look with this beautiful set of three premium scrunchies in soft neutral shades',120,'accessories','photos/Awomen7.jpg',1),
    ('Silk Scarf Scrunchie Set with Ribbon Tails - 3 Pack', 'Add a touch of elegance to your hairstyle with this premium set of three satin silk scarf scrunchies featuring long flowing ribbon tails for a bow effect. Includes rich chocolate brown, creamy ivory, and soft nude beige shades. Gentle on hair, no creases or breakage, perfect for ponytails, buns, or half-up styles. Ideal for everyday wear or special occasions – versatile, chic, and timeless.', 180,'accessories', 'photos/Awomen8.jpg',1),
    ('Dainty Heart Solitaire Necklace','Timeless elegance in a minimalist design: a sparkling heart-shaped cubic zirconia solitaire pendant on a delicate 14K gold-filled chain. Perfect for everyday wear or layering. Adjustable length, hypoallergenic, and tarnish-resistant.', 300,'accessories','photos/Awomen9.jpg', 0),
    ('Gold Pavé Diamond Crossover Ring','Sophisticated interlocking crossover design in 14K gold-filled with sparkling pavé-set cubic zirconia diamonds on one band. Comfortable fit, stackable, and perfect for adding subtle glamour to any outfit.',350,'accessories','photos/Awomen10.jpg',1),
    'Crystal Leaf Ear Climber Cuff - Silver','No-piercing needed! This elegant ear cuff climber features sparkling crystal leaves trailing up the ear for a nature-inspired, boho-chic look. Made with high-quality silver plating and cubic zirconia stones.',400,'accessories','photos/Awomen11.jpg',0),
    ('Floral Angel Wings Choker Necklace - Gold & Purple','Whimsical and romantic gold choker featuring delicate purple enamel flowers, layered chains, and a central angel wings pendant with crystal accents. Adjustable fit for a fairy-tale vibe.',550,'accessories','photos/Awomen12.jpg',0),
    ('Boho Layered Crystal Anklet',
    'Multi-layered rose gold chain anklet adorned with dangling clear crystals, charms, and decorative elements. Perfect for beach days, festivals, or adding sparkle to bare ankles. Adjustable and lightweight.',4300,'accessories','photos/Awomen13.jpg',0),
    ('Elegant Swan Ring with Pearl','Graceful open-band swan design in 14K gold-filled, featuring a delicate pearl accent on one wing. Symbolic of beauty and love, adjustable fit for comfort.',2000,'accessories','photos/Awomen14.jpg',1),
    ('Hawaiian Plumeria Flower Hair Claw Set - 6 Pack',
    'Vibrant tropical plumeria (frangipani) flower claw clips in assorted colors: purple, orange, yellow, blue, pink, and more. Strong grip for thick or thin hair, perfect for vacations or summer vibes.',150, 'accessories',
    'photos/Awomen15.jpg',1);
    ");
}

// ===================== FILTER VARIABLES =====================
$category = $_GET['category'] ?? null;
$search   = $_GET['search'] ?? null;
$newOnly  = isset($_GET['new']);

$categories = [];
$products   = [];

// ===================== FETCH CATEGORIES =====================
$catRes = $conn->query("SELECT DISTINCT category FROM products");
while ($row = $catRes->fetch_assoc()) {
    $categories[] = $row['category'];
}

// ===================== FETCH PRODUCTS =====================
$sql = "SELECT * FROM products WHERE 1";

if ($category) {
    $sql .= " AND category = '" . $conn->real_escape_string($category) . "'";
}
if ($search) {
    $sql .= " AND name LIKE '%" . $conn->real_escape_string($search) . "%'";
}
if ($newOnly) {
    $sql .= " AND is_new = 1";
}

$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    $products = $res->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Wear House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

<div class="container mx-auto px-4 py-8">

<!-- HEADER -->
<div class="flex flex-col md:flex-row justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">
        <?php
        if ($category) echo ucfirst($category) . " Collection";
        elseif ($search) echo "Search Results";
        elseif ($newOnly) echo "New Arrivals";
        else echo "Our Collection";
        ?>
    </h1>

    <div class="flex gap-3 mt-4 md:mt-0">
        <form method="GET" class="flex">
            <input name="search" placeholder="Search..."
                   class="border px-4 py-2 rounded-l">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-r">
                Search
            </button>
        </form>

        <select onchange="location=this.value" class="border px-4 py-2 rounded">
            <option value="shop.php">All</option>
            <?php foreach ($categories as $cat): ?>
                <option value="shop.php?category=<?= $cat ?>">
                    <?= ucfirst($cat) ?>
                </option>
            <?php endforeach; ?>
            <option value="shop.php?new=true">New</option>
        </select>
    </div>
</div>

<!-- PRODUCTS -->
<?php if (!empty($products)): ?>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <?php foreach ($products as $p): ?>
        <div class="bg-white rounded shadow hover:shadow-lg transition relative">

            <?php if ($p['is_new']): ?>
                <span class="absolute top-2 right-2 bg-indigo-600 text-white text-xs px-2 py-1 rounded">
                    New
                </span>
            <?php endif; ?>

            <img src="<?= $p['image_url'] ?>" class="w-full h-85 object-cover rounded-t">

            <div class="p-4">
                <h3 class="font-semibold"><?= $p['name'] ?></h3>
                <p class="text-gray-600 mb-2">₹<?= number_format($p['price'], 2) ?></p>

            <form method="post">
    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
    <input type="hidden" name="name" value="<?= $p['name'] ?>">
    <input type="hidden" name="price" value="<?= $p['price'] ?>">
    <button type="submit" name="add_to_cart"
        class="bg-indigo-600 text-white px-4 py-2 rounded w-full">
        Add to Cart
    </button>
</form>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
<p class="text-center text-gray-500">No products found</p>
<?php endif; ?>

</div>
</body>
<?php
// ===================== ADD TO CART =====================
if (isset($_POST['add_to_cart'])) {

    $id    = (int)$_POST['product_id'];
    $name  = $_POST['name'];
    $price = (float)$_POST['price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // MULTIPLE PRODUCTS SUPPORTED
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty']++;
    } else {
        $_SESSION['cart'][$id] = [
            'name'  => $name,
            'price'=> $price,
            'qty'  => 1
        ];
    }
}

// ===================== CLEAR CART =====================
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
}


?>
<div class="cart mt-10 bg-white p-6 rounded shadow">
<h2 class="text-xl font-bold mb-4">Order Details</h2>

<?php if (!empty($_SESSION['cart'])): ?>
<table class="w-full border">
<tr class="bg-gray-200">
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

<?php
$total = 0;
foreach ($_SESSION['cart'] as $item):
    $line = $item['price'] * $item['qty'];
    $total += $line;
?>
<tr>
    <td><?= $item['name'] ?></td>
    <td>₹<?= $item['price'] ?></td>
    <td><?= $item['qty'] ?></td>
    <td>₹<?= $line ?></td>
</tr>
<?php endforeach; ?>

<tr class="font-bold">
    <td colspan="3">Grand Total</td>
    <td>₹<?= $total ?></td>
</tr>
</table>

<form method="post" class="mt-4 flex gap-4">
    <button name="clear_cart"
        class="bg-red-600 text-white px-4 py-2 rounded">
        Cancel Order
    </button>

    <a href="cart.php"
        class="bg-green-600 text-white px-4 py-2 rounded">
        Add to Cart
    </a>
</form>

<?php else: ?>
<p class="text-gray-500">No Product Selected.</p>
<?php endif; ?>
</div>

</body>
</html>
