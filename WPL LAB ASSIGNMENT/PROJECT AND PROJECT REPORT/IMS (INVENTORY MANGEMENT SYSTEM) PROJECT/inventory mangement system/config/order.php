<?php
session_start();
require_once 'db.php';

if (isset($_POST['add_order'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $total_amount = $_POST['total_amount'];

    $status = 'pending';

    $sql = "INSERT INTO orders (user_id, product_id, quantity, unit_price, total_amount, status) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiidss", $user_id, $product_id, $quantity, $unit_price, $total_amount, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Order updated successfully');</script>";
        $update = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?");
        $update->bind_param("ii", $quantity, $product_id);
        $update->execute();
        echo "<script>window.location.href = '../order.php?msg=updated';</script>";
        exit();
    } else {
        echo "<script>alert('Order updated failed');</script>";
        echo "<script>window.location.href = '../order.php?msg=updated';</script>";
        exit();
    }
}


if (isset($_POST['update_order'])) {
    
    $order_id     = $_POST['order_id'];
    $status       = $_POST['status'];
    $total_amount = $_POST['total_amount'];
    $product_id   = $_POST['product_id'];
    $quantity     = $_POST['quantity'];
    $old_quantity = $_POST['old_quantity'];
    $unit_price   = $_POST['unit_price'];

    
    $calculated_total = $quantity * $unit_price;

    
    $sql = "UPDATE orders 
            SET status = ?, 
                total_amount = ?, 
                product_id = ?, 
                quantity = ?, 
                unit_price = ? 
            WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdiiii", $status, $calculated_total, $product_id, $quantity, $unit_price, $order_id);

    if ($stmt->execute()) {
        echo "<script>alert('Order updated successfully');</script>";
        if ($quantity > $old_quantity) {
            $quantity_diff = $quantity - $old_quantity;
            $update = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?");
            $update->bind_param("ii", $quantity_diff, $product_id);
            $update->execute();
        }
        else{
            $quantity_diff = $old_quantity - $quantity;
            $update = $conn->prepare("UPDATE products SET quantity = quantity + ? WHERE product_id = ?");
            $update->bind_param("ii", $quantity_diff, $product_id);
            $update->execute();
        }
        
        echo "<script>window.location.href = '../order.php?msg=updated';</script>";
        exit();
    } else {
        echo "<script>alert('Order updated failed');</script>";
        echo "<script>window.location.href = '../order.php?msg=updated';</script>";
        exit();
    }
}
if (isset($_GET['delete_order'])) {
    $order_id = $_GET['delete_order'];
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    if ($stmt->execute()) {
        echo "<script>alert('Order deleted successfully');</script>";
        echo "<script>window.location.href = '../order.php?msg=deleted';</script>";
        exit();
    } else 
    {
        echo "<script>alert('Order delete failed');</script>";
        echo "<script>window.location.href = '../order.php?msg=failed';</script>";
        exit();
    }
}
