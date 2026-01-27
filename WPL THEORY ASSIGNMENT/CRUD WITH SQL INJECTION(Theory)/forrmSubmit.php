<?php
$conn = mysqli_connect('localhost', 'root', '', 'wpl');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$product_name = $_POST['product_name'];
$product_category = $_POST['product_category'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];


$stmt = mysqli_prepare($conn, "INSERT INTO products(product_name, product_category, product_price, product_quantity) VALUES (?, ?, ?, ?)");


mysqli_stmt_bind_param($stmt, "ssdi", $product_name, $product_category, $product_price, $product_quantity);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>