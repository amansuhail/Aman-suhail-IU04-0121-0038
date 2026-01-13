<?php
include("db.php");


if (isset($_POST['add_category'])) {
    $name        = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO categories (category_name, description) VALUES ('$name', '$description')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Category added successfully.');
                window.location.href = '../category.php';
              </script>";
        exit;
    }
}


if (isset($_POST['update_category'])) {
    $id          = (int) $_POST['category_id'];
    $name        = mysqli_real_escape_string($conn, $_POST['category_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "UPDATE categories SET category_name='$name', description='$description' WHERE category_id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Category updated successfully.');
                window.location.href = '../category.php';
              </script>";
        exit;
    }
}

?>