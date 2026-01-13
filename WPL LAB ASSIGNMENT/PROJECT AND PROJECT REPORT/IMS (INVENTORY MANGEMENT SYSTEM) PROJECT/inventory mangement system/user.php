<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory MS - Users</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="container">
    
    <?php include("layout/sidebar.php"); ?>

 
    <main class="content">
      <h2>User Management</h2>
      <button class="btn edit-btn" onclick="openAddModal()">Add User</button>

      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("config/db.php");
          $i = 1;
          $result = mysqli_query($conn, "SELECT * FROM users where role!='admin' ORDER BY user_id ASC");
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= ucfirst($row['role']) ?></td>
              <td><?= $row['address'] ?></td>
              <td>
                <a href="#" class="btn edit-btn"
                   onclick="openEditModal(
                     <?= $row['user_id'] ?>,
                     '<?= $row['name'] ?>',
                     '<?= $row['email'] ?>',
                     '<?= $row['role'] ?>',
                     '<?= $row['address'] ?>'
                   )">Edit</a>
                <a href="config/user.php?delete_id=<?= $row['user_id'] ?>" class="btn delete-btn"
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
      <h3>Add User</h3>
      <form method="POST" action="config/user.php">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
          <option value="">Select Role</option>
          <option value="user">user</option>
          
        </select>
        <input type="text" name="address" placeholder="Address">
        <button name="add_user">Save</button>
        <button type="button" onclick="closeAddModal()">Cancel</button>
      </form>
    </div>
  </div>

  
  <div id="editModal" class="modal">
    <div class="modal-content">
      <h3>Edit User</h3>
      <form method="POST" action="config/user.php">
        <input type="hidden" name="user_id" id="edit_id">
        <label>Name:</label>
        <input type="text" name="name" id="edit_name" required>
        <label>Email:</label>
        <input type="email" name="email" id="edit_email" required>
        <label>Role:</label>
        <select name="role" id="edit_role" required>
          <option value="admin">Admin</option>
          <option value="manager">Manager</option>
          <option value="staff">Staff</option>
        </select>
        <label>Address:</label>
        <input type="text" name="address" id="edit_address">
        <button name="update_user">Update</button>
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
    function openEditModal(id, name, email, role, address) {
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_name').value = name;
      document.getElementById('edit_email').value = email;
      document.getElementById('edit_role').value = role;
      document.getElementById('edit_address').value = address;
      document.getElementById('editModal').style.display = 'flex';
    }
    function closeEditModal() {
      document.getElementById('editModal').style.display = 'none';
    }
  </script>
</body>
</html>
