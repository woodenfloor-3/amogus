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
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['srn'] = $row['srn'];
        $_SESSION['userEmail'] = $loginUsername;

        header('Location: index.php');
        exit();
      }
      else{
        $showError = true;
        header("location: index.php?loginfailed=true");
      }
    }
  }
  else{
    $showError = true;
    header("location: index.php?loginfailed=true");
  }
}
?>
