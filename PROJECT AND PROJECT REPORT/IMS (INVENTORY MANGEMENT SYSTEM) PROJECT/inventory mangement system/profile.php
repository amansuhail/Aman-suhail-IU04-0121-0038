<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Inventory MS - Profile</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .profile-form {
      max-width: 600px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 3px 10px #0001;
    }

    .profile-form h2 {
      margin-bottom: 20px;
      color: #0ea5e9;
      text-align: center;
    }

    .profile-form label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #555;
    }

    .profile-form input,
    .profile-form select {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 16px;
    }

    .profile-form button {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background: #0ea5e9;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .profile-form button:hover {
      background: #0284c7;
    }

    .input-like {
      width: 100%;
      padding: 12px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      background-color: #f9fafb;
      font-size: 16px;
      color: #333;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php include("layout/sidebar.php");
    include("config/db.php");


    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");
    $user = mysqli_fetch_assoc($result);
    ?>

    <main class="content">
      <form class="profile-form" method="POST" action="config/profile.php?= $user['user_id'] ?>">
        <h2><i class="fas fa-user-circle"></i> User Profile</h2>

        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" required>

        <label>Email:</label>
        <input type="email" name="email"  value="<?= $user['email'] ?>" required>

        <label>Role:</label>
        <div style="width: 100%; padding: 5px; border: 1px solid black;"><?= $user['role'] ?></div>


        <label>Address:</label>
        <input type="text" name="address" value="<?= $user['address'] ?>">

        <label>New Password (optional):</label>
        <input type="password" name="password" required placeholder="Enter new password">

        <button name="update_user">Update Profile</button>
      </form>
    </main>
  </div>
</body>

</html>