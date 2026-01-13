<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory MS - Products</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <div class="container">
    
    <?php include("layout/sidebar.php"); ?>

    
    <main class="content">
      <h2>Products Management</h2>

      
      <button class="btn edit-btn" onclick="openAddModal()">Add Product</button>

      
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Item</th>
            <th>Category</th>
            <th>SKU</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("config/db.php");

          
          $sql = "SELECT p.product_id,
               p.product_name,
               p.sku,
               p.quantity,
               p.unit_price,
               p.status,
               p.category_id,
               p.supplier_id,
               c.category_name,
               s.supplier_name
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.category_id
        LEFT JOIN suppliers s ON p.supplier_id = s.supplier_id
        ORDER BY p.product_id ASC";

          $res = mysqli_query($conn, $sql);
          $counter = 1;

          while ($row = mysqli_fetch_assoc($res)) {
          
            $productName = htmlspecialchars($row['product_name'], ENT_QUOTES);
            $sku         = htmlspecialchars($row['sku'], ENT_QUOTES);
            $price       = $row['unit_price'] * $row['quantity'];

            echo "<tr>
        <td>{$counter}</td>
        <td>{$productName}</td>
        <td>{$row['category_name']}</td>
        <td>{$sku}</td>
        <td>{$row['supplier_name']}</td>
        <td>{$row['quantity']}</td>
        <td>{$row['unit_price']}</td>
        <td>{$price}</td>
        <td>
          <a href='#' class='btn edit-btn'
             onclick=\"openEditModal({$row['product_id']}, '{$productName}', {$row['category_id']}, '{$sku}', {$row['supplier_id']}, {$row['unit_price']}, {$row['quantity']})\">Edit</a>
          <a href='config/product.php?delete_product={$row['product_id']}'
             class='btn delete-btn'
             onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a>
        </td>
      </tr>";
            $counter++;
          }
          ?>

        </tbody>


      </table>
    </main>
  </div>

  
  <div id="addModal" class="modal">
    <div class="modal-content">
      <h3>Add Product</h3>
      <form method="POST" action="config/product.php">

        
        <input type="text" name="product_name" placeholder="Item Name" required>

        
        <select name="category_id" required>
          <option value="">Select Category</option>
          <?php
          include("config/db.php");
          $cats = mysqli_query($conn, "SELECT category_id, category_name FROM categories ORDER BY category_name ASC");
          while ($c = mysqli_fetch_assoc($cats)) {
            echo "<option value='{$c['category_id']}'>{$c['category_name']}</option>";
          }
          ?>
        </select>

        
        <select name="supplier_id" required>
          <option value="">Select Supplier</option>
          <?php
          include("config/db.php");
          $suppliers = mysqli_query($conn, "SELECT supplier_id, supplier_name FROM suppliers ORDER BY supplier_name ASC");
          while ($s = mysqli_fetch_assoc($suppliers)) {
            echo "<option value='{$s['supplier_id']}'>{$s['supplier_name']}</option>";
          }
          ?>
        </select>

        
        <input type="text" name="sku" placeholder="SKU Code" required>

       
        <input type="number" name="quantity" placeholder="Quantity" min="0" required>

       
        <input type="number" step="0.01" name="unit_price" placeholder="Unit Price" required>


        
        <button type="submit" name="add_product">Save</button>
        <button type="button" onclick="closeAddModal()">Cancel</button>
      </form>
    </div>
  </div>


  
  <div id="editModal" class="modal">
    <div class="modal-content">
      <h3>Edit Product</h3>
      <form method="POST" action="config/product.php">
      
        <input type="hidden" name="product_id" id="edit_id">

        
        <label>Name:</label>
        <input type="text" name="product_name" id="edit_name" required>

       
        <label>Category:</label>
        <select name="category_id" id="edit_category" required>
          <option value="">Select Category</option>
          <?php
          include("config/db.php");
          $cats = mysqli_query($conn, "SELECT category_id, category_name FROM categories ORDER BY category_name ASC");
          while ($c = mysqli_fetch_assoc($cats)) {
            echo "<option value='{$c['category_id']}'>{$c['category_name']}</option>";
          }
          ?>
        </select>

        
        <label>SKU:</label>
        <input type="text" name="sku" id="edit_sku" required>

        
        <label>Quantity:</label>
        <input type="number" name="quantity" id="edit_quantity" min="0" required>

        <label>Unit Price:</label>
        <input type="number" step="0.01" name="unit_price" id="edit_unit_price" required>

        
        <label>Supplier:</label>
        <select name="supplier_id" id="edit_supplier" required>
          <option value="">Select Supplier</option>
          <?php
          include("config/db.php");
          $suppliers = mysqli_query($conn, "SELECT supplier_id, supplier_name FROM suppliers ORDER BY supplier_name ASC");
          while ($s = mysqli_fetch_assoc($suppliers)) {
            echo "<option value='{$s['supplier_id']}'>{$s['supplier_name']}</option>";
          }
          ?>
        </select>



       
        <button type="submit" name="update_product">Update</button>
        <button type="button" onclick="closeEditModal()">Cancel</button>
      </form>
    </div>
  </div>

  <script src="assets/js/app.js"></script>
</body>

</html>