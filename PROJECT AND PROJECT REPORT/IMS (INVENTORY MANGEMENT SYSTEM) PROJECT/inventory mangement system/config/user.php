<?php
include("db.php");

if (isset($_POST['add_user'])) {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $role     = mysqli_real_escape_string($conn, $_POST['role']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password, role, address) 
            VALUES ('$name', '$email', '$hashed_password', '$role', '$address')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('User added successfully.');
                window.location.href = '../user.php';
              </script>";
        exit;
    }
}


if (isset($_POST['update_user'])) {
    $id      = (int) $_POST['user_id'];
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $role    = mysqli_real_escape_string($conn, $_POST['role']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "UPDATE users 
            SET name='$name', email='$email', role='$role', address='$address' 
            WHERE user_id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('User updated successfully.');
                window.location.href = '../user.php';
              </script>";
        exit;
    }
}


if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];
    $sql = "DELETE FROM users WHERE user_id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('User deleted successfully.');
                window.location.href = '../user.php';
              </script>";
        exit;
    }
}
?>
