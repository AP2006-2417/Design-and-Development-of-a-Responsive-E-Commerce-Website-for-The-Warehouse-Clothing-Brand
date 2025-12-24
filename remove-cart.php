<?php
session_start();
$conn = new mysqli("localhost", "root", "", "thewearhouse");
if ($conn->connect_error) die("DB Error");

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $conn->query("DELETE FROM cart WHERE id = $id");
}

header("Location: cart.php");
exit;
