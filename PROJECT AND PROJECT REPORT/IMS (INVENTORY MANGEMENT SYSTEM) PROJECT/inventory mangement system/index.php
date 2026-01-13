<?php

include("config/db.php"); 


$product_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(product_id) AS total FROM products"))['total'];


$category_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(category_id) AS total FROM categories"))['total'];


$order_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(order_id) AS total FROM orders"))['total'];


$supplier_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(supplier_id) AS total FROM suppliers"))['total'];


$user_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(user_id) AS total FROM users where role='user'"))['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory MS - Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 
</head>
<body>
  <div class="container">
    <?php include("layout/sidebar.php"); ?>

    <main class="content">
      <h2>Dashboard</h2>
      <div class="cards">
        <div class="card"><i class="fas fa-box"></i><div class="card-info"><h3>Products</h3><p><?= $product_count ?></p></div></div>
        <div class="card"><i class="fas fa-tags"></i><div class="card-info"><h3>Categories</h3><p><?= $category_count ?></p></div></div>
        <div class="card"><i class="fas fa-shopping-cart"></i><div class="card-info"><h3>Orders</h3><p><?= $order_count ?></p></div></div>
        <div class="card"><i class="fas fa-truck"></i><div class="card-info"><h3>Suppliers</h3><p><?= $supplier_count ?></p></div></div>
        <div class="card"><i class="fas fa-users"></i><div class="card-info"><h3>Users</h3><p><?= $user_count ?></p></div></div>
      </div>
    </main>
  </div>
</body>
</html>
