<?php

$conn = mysqli_connect('localhost', 'root', '', 'wpl');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['product_id'];

$stmt = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: index.php');
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>