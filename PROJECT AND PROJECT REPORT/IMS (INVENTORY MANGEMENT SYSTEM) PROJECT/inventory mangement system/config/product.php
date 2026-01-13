<?php
include("db.php");



if (isset($_POST['add_product'])) {
    $category_id = (int) $_POST['category_id'];
    $supplier_id = (int) $_POST['supplier_id'];
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $sku          = mysqli_real_escape_string($conn, $_POST['sku']);
    $quantity     = (int) $_POST['quantity'];
    $unit_price   = (float) $_POST['unit_price'];

    $sql = "INSERT INTO products 
            (category_id, supplier_id, product_name, sku, quantity, unit_price ) 
            VALUES 
            ($category_id, $supplier_id, '$product_name', '$sku', $quantity, $unit_price)";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Product added successfully.');
                window.location.href = '../product.php';
              </script>";
        exit;
    }
}

if (isset($_POST['update_product'])) {
    $id           = (int) $_POST['product_id'];
    $category_id  = (int) $_POST['category_id'];
    $supplier_id  = (int) $_POST['supplier_id'];
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $sku          = mysqli_real_escape_string($conn, $_POST['sku']);
    $quantity     = (int) $_POST['quantity'];
    $unit_price   = (float) $_POST['unit_price'];


    $sql = "UPDATE products 
            SET category_id=$category_id, 
                supplier_id=$supplier_id, 
                product_name='$product_name', 
                sku='$sku', 
                quantity=$quantity, 
                unit_price=$unit_price
            WHERE product_id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Product updated successfully.');
                window.location.href = '../product.php';
              </script>";
        exit;
    }
}

if (isset($_GET['delete_product'])) {
    $product_id = (int) $_GET['delete_product'];
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        echo "<script> alert('Product deleted successfully.'); window.location.href = '../product.php?msg=deleted'; </script>";
        exit;
    } else {
        echo "<script> alert('Product delete failed.'); window.location.href = '../product.php?msg=failed'; </script>";
        exit;
    }
}
