<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['update_user'])) {
    $id      = (int) $_POST['user_id'];
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = trim($_POST['password']);


    if (!empty($password)) {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users 
                SET name='$name', email='$email', address='$address', password='$hashedPassword' 
                WHERE user_id=$id";
    } else {
        $sql = "UPDATE users 
                SET name='$name', email='$email', address='$address' 
                WHERE user_id=$id";
    }

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Profile updated successfully.');
                window.location.href = '../profile.php';
              </script>";
        exit;
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
?>
