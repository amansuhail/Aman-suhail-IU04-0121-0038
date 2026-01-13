<?php

$host     = "localhost";       
$username = "root";            
$password = "";                
$db_name  = "inventory_db";    

$conn = mysqli_connect($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
