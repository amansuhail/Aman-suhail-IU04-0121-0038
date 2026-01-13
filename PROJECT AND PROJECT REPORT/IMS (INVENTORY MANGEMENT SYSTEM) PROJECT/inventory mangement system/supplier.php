<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory MS - Suppliers</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="container">
  
    <?php include("layout/sidebar.php"); ?>

 
    <main class="content">
      <h2>Supplier Management</h2>
      <button class="btn edit-btn" onclick="openAddModal()">Add Supplier</button>

      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Supplier Name</th>
            <th>Contact Person</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("config/db.php");
          $i = 1;
          $result = mysqli_query($conn, "SELECT * FROM suppliers");
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $row['supplier_name'] ?></td>
              <td><?= $row['contact_person'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['address'] ?></td>
              <td>
                <a href="#" class="btn edit-btn"
                   onclick="openEditModal(
                     <?= $row['supplier_id'] ?>,
                     '<?= $row['supplier_name'] ?>',
                     '<?= $row['contact_person'] ?>',
                     '<?= $row['phone'] ?>',
                     '<?= $row['email'] ?>',
                     '<?= $row['address'] ?>'
                   )">Edit</a>
                <a href="config/supplier.php?delete_id=<?= $row['supplier_id'] ?>" class="btn delete-btn"
                   onclick="return confirm('Are you sure?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </main>
  </div>

 
  <div id="addModal" class="modal">
    <div class="modal-content">
      <h3>Add Supplier</h3>
      <form method="POST" action="config/supplier.php">
        <input type="text" name="supplier_name" placeholder="Supplier Name" required>
        <input type="text" name="contact_person" placeholder="Contact Person">
        <input type="text" name="phone" placeholder="Phone">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="address" placeholder="Address">
        <button name="add_supplier">Save</button>
        <button type="button" onclick="closeAddModal()">Cancel</button>
      </form>
    </div>
  </div>

  <div id="editModal" class="modal">
    <div class="modal-content">
      <h3>Edit Supplier</h3>
      <form method="POST" action="config/supplier.php">
        <input type="hidden" name="supplier_id" id="edit_id">
        <label>Name:</label>
        <input type="text" name="supplier_name" id="edit_name" required>
        <label>Contact Person:</label>
        <input type="text" name="contact_person" id="edit_contact">
        <label>Phone:</label>
        <input type="text" name="phone" id="edit_phone">
        <label>Email:</label>
        <input type="email" name="email" id="edit_email">
        <label>Address:</label>
        <input type="text" name="address" id="edit_address">
        <button name="update_supplier">Update</button>
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
    function openEditModal(id, name, contact, phone, email, address) {
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_name').value = name;
      document.getElementById('edit_contact').value = contact;
      document.getElementById('edit_phone').value = phone;
      document.getElementById('edit_email').value = email;
      document.getElementById('edit_address').value = address;
      document.getElementById('editModal').style.display = 'flex';
    }
    function closeEditModal() {
      document.getElementById('editModal').style.display = 'none';
    }
  </script>
</body>
</html>
