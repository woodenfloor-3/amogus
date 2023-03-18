<?php
// Include the database connection file
include "partials/_connect.php";

// Initialize variables
$thread_id = '';
$thread_title = '';
$thread_desc = '';
$thread_cat_id = '';

// Check if thread_id is set
if(isset($_GET['thread_id'])) {
  $thread_id = $_GET['thread_id'];

  // Fetch thread data from the database
  $stmt = $conn->prepare("SELECT * FROM threads WHERE thread_id = ?");
  $stmt->bind_param("i", $thread_id);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if thread data is found
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $thread_title = $data['thread_title'];
    $thread_desc = $data['thread_desc'];
    $thread_cat_id = $data['thread_cat_id'];
  } else {
    // Redirect to homepage if thread data is not found
    header('Location: index.php');
    exit();
  }
}

// Check if form is submitted
if(isset($_POST['submit'])) {
  $thread_id = $_POST['thread_id'];
  $thread_title = $_POST['thread_title'];
  $thread_desc = $_POST['thread_desc'];
  $thread_cat_id = $_POST['thread_cat_id'];

  // Update thread data in the database
  $stmt = $conn->prepare("UPDATE threads SET thread_title = ?, thread_desc = ?, thread_cat_id = ? WHERE thread_id = ?");
  $stmt->bind_param("ssii", $thread_title, $thread_desc, $thread_cat_id, $thread_id);
  $stmt->execute();

  // Redirect to thread page after updating
  header("Location: thread.php?thread_id=$thread_id");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Thread</title>
  <!-- Link to Bootstrap CSS file -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to custom CSS file -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <div class="container">
    <h2>Edit Thread</h2>
    <form method="post" action="">
      <div class="form-group">
        <label>Thread Title:</label>
        <input type="text" class="form-control" name="thread_title" value="<?= $thread_title ?>">
      </div>
      <div class="form-group">
        <label>Thread Description:</label>
        <textarea class="form-control" name="thread_desc"><?= $thread_desc ?></textarea>
      </div>
      <div class="form-group">
        <label>Category:</label>
        <select class="form-control" name="thread_cat_id">
          <?php
          // Fetch category data from the database
          $sql = mysqli_query($conn,"SELECT * FROM categories");

          // Loop through category data and display as options in the dropdown
          while($data = mysqli_fetch_array($sql)) {
            $selected = ($data['category_id'] == $thread_cat_id) ? 'selected' : '';
            echo '<option value="' . $data['category_id'] . '" ' . $selected . '>' . $data['category_name'] . '</option>';
          }
          ?>
        </select>
      </div>
      <input type="hidden" name="thread_id" value="<?= $thread_id ?>">

      <button type="submit" class="btn btn-primary">Update</button>
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
