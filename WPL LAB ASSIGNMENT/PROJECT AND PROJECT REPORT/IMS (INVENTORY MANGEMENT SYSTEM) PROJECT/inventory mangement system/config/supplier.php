<?php
include("db.php");

if (isset($_POST['add_supplier'])) {
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $contact_person = mysqli_real_escape_string($conn, $_POST['contact_person']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "INSERT INTO suppliers (supplier_name, contact_person, phone, email, address) 
            VALUES ('$supplier_name', '$contact_person', '$phone', '$email', '$address')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Supplier added successfully.');
                window.location.href = '../supplier.php';
              </script>";
        exit;
    }
}


if (isset($_POST['update_supplier'])) {
    $id = (int) $_POST['supplier_id'];
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $contact_person = mysqli_real_escape_string($conn, $_POST['contact_person']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "UPDATE suppliers 
            SET supplier_name='$supplier_name', contact_person='$contact_person', phone='$phone', email='$email', address='$address' 
            WHERE supplier_id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Supplier updated successfully.');
                window.location.href = '../supplier.php';
              </script>";
        exit;
    }
}
if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];

    $sql = "DELETE FROM suppliers WHERE supplier_id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Supplier deleted successfully.');
                window.location.href = '../supplier.php';
              </script>";
        exit;
    }
}
?>