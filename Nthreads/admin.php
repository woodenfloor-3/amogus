
<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
  <!-- Link to Bootstrap CSS file -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to custom CSS file -->
  
</head>
<body>

  <div class="container">
    <h2>Thread Details</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Thread ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Category ID</th>
          <th>User ID</th>
          <th>Timestamp</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include "partials/_connect.php"; // Using database connection file here

        $sql = mysqli_query($conn,"SELECT * FROM threads"); // fetch data from database

        while($data = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td><?php echo $data['thread_id']; ?></td>
            <td><?php echo $data['thread_title']; ?></td>
            <td><?php echo $data['thread_desc']; ?></td>
            <td><?php echo $data['thread_cat_id']; ?></td> 
            <td><?php echo $data['thread_user_id']; ?></td>   
            <td><?php echo $data['timestamp']; ?></td>
            <td>
              <button class="btn btn-primary" onclick="location.href='edit_thread.php?id=<?php echo $data['thread_id'];?>'">Edit</button>
            </td>
            <td>
              <button class="btn btn-danger" onclick="location.href='delete_thread.php?id=<?php echo $data['thread_id'];?>'">Delete</button>
            </td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>

    <div class="my-3">
      <button class="btn btn-primary mr-2" onclick="location.href='add_thread.php'">Add Thread</button>
      <button class="btn btn-success mr-2" onclick="location.href='add_category.php'">Add Category</button>
      <button class="btn btn-danger mr-2" onclick="location.href='add_user.php'">Add User</button>
    </div>
  </div>

  <!-- Link to Bootstrap JS file -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-9fXnGLjt1lq/QcG8rJMNHzLmF+kYh3qKV+jHYmP4zU5hxhJ6deye0liV5eSxJh1V"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
