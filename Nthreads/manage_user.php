
<?php
include "partials/_connect.php"; // Using database connection file here

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: adminloginpage.php");
    exit;
}

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
  <!-- Link to Bootstrap CSS file -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to custom CSS file -->
  
</head>
<body>
<div class="text-right">
  <span class="mr-3">Logged in as <?php echo $username; ?></span>
  <a href="admin_logout.php" class="btn btn-danger">Logout</a>
</div>
  <div class="container">
    <h2>User Details</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>User Password</th>
          <th>User Account Created</th>
          <th>User Profile</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include "partials/_connect.php"; // Using database connection file here

        $sql = mysqli_query($conn,"SELECT * FROM users"); // fetch data from database

        while($data = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td><?php echo $data['srn']; ?></td>
            <td><?php echo $data['user_email']; ?></td>
            <td><?php echo $data['user_password']; ?></td>
            <td><?php echo $data['timestamp']; ?></td>
            <td><img src="<?php echo $data['user_image']; ?>" height="50"></td>

            <td>
              <button class="btn btn-danger" onclick="location.href='delete_user.php?id=<?php echo $data['srn'];?>'">Delete</button>
            </td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>

    <div class="my-3">
      <button class="btn btn-primary mr-2" onclick="location.href='add_user.php'">Add User</button>
      <button class="btn btn-success mr-2" onclick="location.href='admin.php'">Back</button>
    </div>
  </div>

  <!-- Link to Bootstrap JS file -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-9fXnGLjt1lq/QcG8rJMNHzLmF+kYh3qKV+jHYmP4zU5hxhJ6deye0liV5eSxJh1V"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
