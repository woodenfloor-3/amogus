<!-- Add Category Form -->
<html>
    <title>Add Category</title>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="mb-4">Add Category</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category_name">Category Name:</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                        <div class="form-group">
                            <label for="category_description">Category Description:</label>
                            <textarea class="form-control" id="category_description" name="category_description" rows="3" required></textarea>
                            <div class="form-group">
    <label for="image">Category Image:</label>
    <input type="file" class="form-control-file" id="category_image" name="image" accept="image/*" >
</div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
<?php
include "partials/_connect.php"; // Using database connection file here
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {

        $target_dir = 'uploads/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $upload_success = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        if ($upload_success) {
            // Insert path to uploaded file into database
            $category_name = $_POST['category_name'];
            $category_description = $_POST['category_description'];
            $image_path = $target_file;
            $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `image_path`) VALUES ('$category_name', '$category_description', '$image_path')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo 'Category added successfully';
            } else {
                echo 'Error adding category';
            }
        } else {
            echo 'Error uploading image';
        }
    } else {
        echo 'Image not uploaded';
    }
}

?>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
