<?php

$conn = mysqli_connect('localhost', 'root', '', 'wpl');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_category = $_POST['product_category'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];

$stmt = mysqli_prepare($conn, "UPDATE products SET 
    product_name = ?, 
    product_category = ?, 
    product_price = ?, 
    product_quantity = ? 
    WHERE id = ?");



mysqli_stmt_bind_param($stmt, "ssdii", $product_name, $product_category, $product_price, $product_quantity, $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: index.php');
    exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>
