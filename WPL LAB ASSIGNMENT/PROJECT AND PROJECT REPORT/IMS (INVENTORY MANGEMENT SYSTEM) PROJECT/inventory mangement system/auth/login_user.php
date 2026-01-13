<?php
session_start();
include("../config/db.php"); 

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    
    $sql = "SELECT user_id, name, email, password, role FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id']    = $user['user_id'];
            $_SESSION['user_name']  = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];

            
            header("Location: ../index.php");
            exit;
        } else {
            echo "<script>
                    alert('Invalid password.');
                    window.location.href = 'login.php';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('User not found.');
                window.location.href = 'login.php';
              </script>";
        exit;
    }
}
?>
