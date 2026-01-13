<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory MS - Categories</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="container">
  
    <?php include("layout/sidebar.php"); ?>

    
    <main class="content">
      <h2>Category Management</h2>

   
      <button class="btn edit-btn" onclick="openAddModal()">Add Category</button>

      
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("config/db.php");
          $i = 1;
          $result = mysqli_query($conn, "SELECT * FROM categories");
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $row['category_name'] ?></td>
              <td><?= $row['description'] ?></td>
              <td>
                <a href="#" class="btn edit-btn" 
                   onclick="openEditModal(<?= $row['category_id'] ?>,'<?= $row['category_name'] ?>','<?= $row['description'] ?>')">Edit</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </main>
  </div>

  
  <div id="addModal" class="modal">
    <div class="modal-content">
      <h3>Add Category</h3>
      <form method="POST" action="config/category.php">
        <input type="text" name="name" placeholder="Category Name" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button name="add_category">Save</button>
        <button type="button" onclick="closeAddModal()">Cancel</button>
      </form>
    </div>
  </div>

  
  <div id="editModal" class="modal">
    <div class="modal-content">
      <h3>Edit Category</h3>
      <form method="POST" action="config/category.php">
        <input type="hidden" name="category_id" id="edit_id">
        <label>Name:</label>
        <input type="text" name="category_name" id="edit_name" required>
        <label>Description:</label>
        <textarea name="description" id="edit_description"></textarea>
        <button name="update_category">Update</button>
        <button type="button" onclick="closeEditModal()">Cancel</button>
      </form>
    </div>
  </div>

  
  <script>
    function openAddModal() {
      document.getElementById('addModal').style.display = 'flex';
    }
    function closeAddModal() {
      document.getElementById('addModal').style.display = 'none';
    }
    function openEditModal(id, name, description) {
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_name').value = name;
      document.getElementById('edit_description').value = description;
      document.getElementById('editModal').style.display = 'flex';
    }
    function closeEditModal() {
      document.getElementById('editModal').style.display = 'none';
    }
  </script>
</body>
</html>
