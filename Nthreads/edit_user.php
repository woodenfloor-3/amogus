<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <!-- Link to Bootstrap CSS file -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to custom CSS file -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
    <h2>Edit User</h2>
    <form method="post" action="update_user.php">
      <?php
      include "partials/_connect.php"; // Using database connection file here

      // Retrieve user information
      $user_id = $_GET['user_id'];
      $sql = mysqli_query($conn,"SELECT * FROM users WHERE user_id=$user_id");
      $data = mysqli_fetch_array($sql);
      ?>

      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <button type="submit" class="btn btn-primary">Update User</button>
      </div>
    </form>
  </div>

  <!-- Link to Bootstrap JS file -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-9fXnGLjt1lq/QcG8rJMNHzLmF+kYh3qKV+jHYmP4zU5hxhJ6deye0liV5eSxJh1V"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
