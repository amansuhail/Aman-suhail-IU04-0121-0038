
<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
?>

<div class="sidebar">
  <div class="sidebar-header">
    <i class="fas fa-boxes-stacked"></i> Inventory Pro
  </div>

  <ul class="sidebar-menu">
    <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="product.php"><i class="fas fa-box"></i> Products</a></li>
    <li><a href="category.php"><i class="fas fa-tags"></i> Categories</a></li>
    <li><a href="order.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
    <li><a href="supplier.php"><i class="fas fa-truck"></i> Suppliers</a></li>
    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') { echo '<li><a href="user.php"><i class="fas fa-users"></i> Users</a></li>'; } ?>
    <li><a href="profile.php"><i class="fas fa-user-circle"></i> Profile</a></li>
    <li><a href="auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>
