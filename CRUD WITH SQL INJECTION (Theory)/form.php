<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <form method="post" action="forrmSubmit.php">
      <div class="form-group" style="margin: 10px;">
        <label for="">Product </label>
        <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label>Product Category</label>
        <input type="text" class="form-control" name="product_category" placeholder="Enter product category">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label>Product Price</label>
        <input type="number" class="form-control" name="product_price" placeholder="Enter product price">
      </div>
      <div class="form-group" style="margin: 10px;">
        <label>Product Quantity</label>
        <input type="number" class="form-control" name="product_quantity" placeholder="Enter product quantity">
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