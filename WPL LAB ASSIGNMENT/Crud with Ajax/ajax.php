<?php
$conn = mysqli_connect("localhost","root","","student_db");

$action = $_REQUEST['action'] ?? "";


if($action == "create"){
    mysqli_query($conn,
        "INSERT INTO students (name,email,course)
         VALUES ('$_POST[name]','$_POST[email]','$_POST[course]')");
}


elseif($action == "read"){
    $res = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['course']}</td>
            <td>
                <button class='btn btn-warning btn-sm edit' data-id='{$row['id']}'>Edit</button>
                <button class='btn btn-danger btn-sm delete' data-id='{$row['id']}'>Delete</button>
            </td>
        </tr>";
    }
}


elseif($action == "get"){
    $res = mysqli_query($conn,"SELECT * FROM students WHERE id=$_GET[id]");
    echo json_encode(mysqli_fetch_assoc($res));
}

elseif($action == "update"){
    mysqli_query($conn,
        "UPDATE students SET
         name='$_POST[name]',
         email='$_POST[email]',
         course='$_POST[course]'
         WHERE id=$_POST[id]");
}

elseif($action == "delete"){
    mysqli_query($conn,"DELETE FROM students WHERE id=$_POST[id]");
}
?>
