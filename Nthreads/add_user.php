<html>
    <title>Add User</title>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="mb-4">Add User</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_email">Username:</label>
                            <input type="text" class="form-control" id="user_email" name="user_email" required>
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password:</label>
                            <input type="password" class="form-control" id="user_password" name="user_password" required>
                        </div>
                        <div class="form-group">
                            <label for="user_image">User Image:</label>
                            <input type="file" class="form-control-file" id="user_image" name="user_image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="admin.php" class="btn btn-secondary">Back to Admin</a>
                        <a href="index.php" class="btn btn-success">Back to Forum</a>
                    </form>
                </div>
            </div>
        </div>

        <?php
    include "partials/_connect.php"; // Using database connection file here

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle file upload
        if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = 'userimgs/';
            $target_file = $target_dir . basename($_FILES['user_image']['name']);
            $upload_success = move_uploaded_file($_FILES['user_image']['tmp_name'], $target_file);

            if ($upload_success) {
                // Insert path to uploaded file into database
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                $user_image = $target_file;

                $sql = "INSERT INTO `users` (`user_email`, `user_password`, `user_image`, `timestamp`) VALUES ('$user_email', '$user_password', '$user_image', current_timestamp())";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo '<div class="alert alert-success mt-3">User added successfully</div>';
                } else {
                    echo '<div class="alert alert-danger mt-3">Error adding user: ' . mysqli_error($conn) . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3">Error uploading image</div>';
            }
        } else {
            echo '<div class="alert alert-danger mt-3">Image not uploaded</div>';
        }
    }
?>

<!-- Link to Bootstrap JS file -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-9fXnGLjt1lq/QcG8rJMNHzLmF+kYh3qKV+jHYmP4zU5hxhJ6deye0liV5eSxJh1V"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>