<?php
$id = $_GET['product_id'];

$conn = mysqli_connect('localhost', 'root', '', 'wpl');

$query = "SELECT * FROM products WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <form method="post" action="editForrmSubmit.php">
      <div class="form-group" style="margin: 10px;">
        <input value="<?php echo $data[0]['id']?>" type="hidden" class="form-control" name="product_id" placeholder="Enter product name">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label for="">Product Name</label>
        <input value="<?php echo $data[0]['product_name']?>" type="text" class="form-control" name="product_name" placeholder="Enter product name">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label>Product Category</label>
        <input value="<?php echo $data[0]['product_category']?>" type="text" class="form-control" name="product_category" placeholder="Enter product category">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label>Product Price</label>
        <input value="<?php echo $data[0]['product_price']?>" type="number" class="form-control" name="product_price" placeholder="Enter product price">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label>Product Quantity</label>
        <input value="<?php echo $data[0]['product_quantity']?>" type="number" class="form-control" name="product_quantity" placeholder="Enter product quantity">
      </div>

    
      <input type="submit" class="btn btn-primary" style="margin: 10px;" value="Submit">
    </form>
  </div>

  <script>
    function SubmitForm() {
      var firstName = document.getElementById('first_name').value;
      if (firstName != '') {
        firstNameRegex = /^[a-zA-Z]{1,1000}$/
        var testFirstName = firstNameRegex.test(firstName)
        alert(testFirstName);
      } else {
        document.getElementById('first_name_error').innerHTML = 'Please insert the value'
      }
    }
  </script>
</body>

</html>