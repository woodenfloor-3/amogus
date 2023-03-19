
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
    <h2>Category Details</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Category ID</th>
          <th>Category Name</th>
          <th>Category Description</th>
          <th>Category Images</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include "partials/_connect.php"; // Using database connection file here

        $sql = mysqli_query($conn,"SELECT * FROM categories"); // fetch data from database

        while($data = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td><?php echo $data['category_id']; ?></td>
            <td><?php echo $data['category_name']; ?></td>
            <td><?php echo $data['category_description']; ?></td>
            <td><img src="<?php echo $data['image_path']; ?>" height="50"></td>

            <td>
              <button class="btn btn-danger" onclick="location.href='delete_category.php?id=<?php echo $data['category_id'];?>'">Delete</button>
            </td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>

    <div class="my-3">
      <button class="btn btn-success mr-2" onclick="location.href='add_category.php'">Add Category</button>
     
      <button class="btn btn-success mr-2" onclick="location.href='admin.php'">Back</button>
    </div>
  </div>

  <!-- Link to Bootstrap JS file -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-9fXnGLjt1lq/QcG8rJMNHzLmF+kYh3qKV+jHYmP4zU5hxhJ6deye0liV5eSxJh1V"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
