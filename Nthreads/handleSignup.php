<?php
  $showAlert = false;
  $showError = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['addThread']) && !isset($_POST['addComment'])){
  // if(isset($_POST['useremail']) || isset($_POST['password']) || isset($_POST['cpassword'])){
  // if(isset($_POST['submit'])){
    
  include 'partials/_connect.php';

  $useremail = $_POST['signupUsername'];
  $password = $_POST['signupPassword'];
  $cpassword = $_POST['signupcPassword'];
  // $exists = false;

  $existSql = "SELECT * FROM users WHERE user_email = '$useremail'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  
  if($numExistRows > 0){
    // $showError = " Username Already Exists";
    header("location: index.php?userexist=true");
  }
  else{
    if($password == $cpassword){
      // $hash = password_hash($password, PASSWORD_DEFAULT);
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
      // $showError = " Password do not match";
      header("location: index.php?passnotmatch=true");
    }
  }
}
?>