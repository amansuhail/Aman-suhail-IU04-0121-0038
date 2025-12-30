<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "facebook_signup";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, surname, dob, gender, email, password)
        VALUES ('$first_name', '$surname', '$dob', '$gender', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Account created successfully!');
                location.href='index.php';   
                </script>   
  ";
} else {
  echo "<script> alert('Account creation failed');
                location.href='index.php';   
                </script>   
  ";
}

$conn->close();
?>
