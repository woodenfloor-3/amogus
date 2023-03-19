<?php
  $showAlert = false;
  $showError = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['addThread']) && !isset($_POST['addComment'])){
    include 'partials/_connect.php';

    $useremail = $_POST['signupUsername'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];

    $existSql = "SELECT * FROM users WHERE user_email = '$useremail'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows > 0){
      header("location: index.php?userexist=true");
    }
    else{
      if($password == $cpassword){
        $hash = $password;

        $sql= "INSERT INTO users (user_email, user_password, timestamp) VALUES ('$useremail', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
          $showAlert = true;
          header("location: index.php?signupsuccess=true");
          exit();
        }
        else{
          header("location: index.php?signupsuccess=false");
        }
      }
      else{
        header("location: index.php?passnotmatch=true");
      }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .container {
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="signupUsername">Username:</label>
        <input type="text" class="form-control" id="signupUsername" placeholder="Enter username" name="signupUsername" required>
      </div>
      <div class="form-group">
        <label for="signupPassword">Password:</label>
        <input type="password" class="form-control" id="signupPassword" placeholder="Enter password" name="signupPassword" required>
      </div>
      <div class="form-group">
        <label for="signupcPassword">Confirm Password:</label>
        <input type="password" class="form-control" id="signupcPassword" placeholder="Enter password again" name="signupcPassword" required>
      </div>
      <button type="submit" class="btn btn-primary" name="addUser">Submit</button>
    </form>
  </div>

  	<!-- Include Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
