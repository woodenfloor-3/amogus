<!DOCTYPE html>
<html>
<head>
	<title>Delete Thread</title>
	<!-- Link to Bootstrap CSS file -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Link to custom CSS file -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="container">
		<h2>Delete Thread</h2>
		<p>Are you sure you want to delete this thread?</p>

		<?php
		include "partials/_connect.php"; // Using database connection file here

		if(isset($_GET['thread_id'])) {
			$thread_id = $_GET['thread_id'];
			$sql = mysqli_query($conn,"SELECT * FROM threads WHERE thread_id='$thread_id'");
			$data = mysqli_fetch_array($sql);
		}
		?>

		<form method="POST" action="delete_thread.php">
			<input type="hidden" name="thread_id" value="<?php echo $data['thread_id']; ?>">
			<button type="submit" class="btn btn-danger">Delete</button>
			<a href="index.php" class="btn btn-secondary">Cancel</a>
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
