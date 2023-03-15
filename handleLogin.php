<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['addThread']) && !isset($_POST['addComment'])){
  $login = false;
  $showError = false;
  include 'partials/_connect.php';
  $loginUsername = $_POST['loginUsername'];
  $loginPass = $_POST['loginPassword'];

  // $sql= "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
  $sql= "SELECT * FROM users WHERE user_email = '$loginUsername'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    while($row = mysqli_fetch_assoc($result)){
      $nohashPass = $row['user_password'];
      if($nohashPass == $loginPass){
      // if( password_verify($loginPass, $row['user_password'])){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['srn'] = $row['srn'];
        $_SESSION['userEmail'] = $loginUsername;

        header("location: index.php?loginsuccess=true");
        // echo "Logged In Successfully   ---   Welcome " . $loginEmail;
        exit();
        }
        else{
          $showError = true;
          echo "Login Failed 1";
          // header("location: index.php");
          header("location: index.php?loginfailed=true");
        }
      }  
    }
    else{
      $showError = true;
      echo "Login Failed 2";
      // header("location: index.php");
      header("location: index.php?loginfailed=true");
    }
}
?>