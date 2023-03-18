<!DOCTYPE html>
<html>
<head>
	<title>Create Thread</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.container {
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Create Thread</h2>
		<form method="post" action="">
			<div class="form-group">
				<label for="title">Thread Title:</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>
			<div class="form-group">
				<label for="desc">Description:</label>
				<textarea class="form-control" id="desc" name="desc" rows="5" required></textarea>
			</div>
			<div class="form-group">
				<label for="cat_id">Category ID:</label>
				<input type="number" class="form-control" id="cat_id" name="cat_id" required>
			</div>
			<div class="form-group">
				<label for="user_id">User ID:</label>
				<input type="number" class="form-control" id="user_id" name="user_id" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Create Thread</button>
		</form>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSYG0w" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
