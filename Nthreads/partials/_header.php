<style>
  /* Navbar */
  .navbar {
    background-color: #000;
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 2rem;
  }

  .navbar-toggler-icon {
    color: #fff;
  }

  .nav-link {
    font-size: 1.2rem;
  }

  .dropdown-menu {
    background-color: #000;
    border: none;
  }

  .dropdown-item {
    color: #fff;
  }

  .form-control {
    background-color: #000;
    border: none;
    border-bottom: 2px solid #fff;
    border-radius: 0;
    color: #fff;
  }

  .btn-outline-success {
    color: #fff;
    border-color: #fff;
  }

  .btn-outline-success:hover {
    background-color: #fff;
    color: #000;
  }

  .text-light {
    font-size: 1.2rem;
  }

  .btn-primary {
    background-color: #000;
    border: none;
    border-radius: 0;
    margin-left: 1rem;
  }

  .btn-primary:hover {
    background-color: #fff;
    color: #000;
  }

  /* Select Element */
  select {
  background-color: #000;
  border: none;
  border-radius: 0;
  color: #fff;
  padding: 0.5rem;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
}

select:focus {
  border-color: #fff;
  outline: none;
  box-shadow: none;
}

select option {
  background-color: #000;
  color: #fff;
}

</style>

<?php
session_start();

// include "partials/_loginModal.php";
// include "partials/exp_signupModal.php";
include "./signupModal.php";
include "./loginModal.php";
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
<a class="navbar-brand" href="index.php">NeatThreads</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT category_name, category_id FROM categories LIMIT 4";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '<a class="dropdown-item" href="threadlist.php?catid='.$row["category_id"].'">' . $row["category_name"] . '</a>';
        }

    echo ' </div>
    </li>
  </ul>
  <div class="row max-2">';

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
    <select name="category_id">
    <option value="">All Categories</option>';
    // Retrieve the list of categories from the database
    $sql = "SELECT category_name, category_id FROM categories LIMIT 4";
    
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
    }
    echo '</select>
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <p class="text-light my-0 mx-2"> Welcome ' . $_SESSION['userEmail'] . '</p>
    <a href="logout.php" class="btn btn-primary mx-2">Logout</a>
    </form>';
  }
else{
  echo '<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <div class="mx-2">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</button>
  <button class="btn btn-primary" data-toggle="modal" data-target="#signupModal">SignUp</button>
  </div>';
}

echo '</div>
</div>
</nav>';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You have created your account successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  exit();
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == false){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> Failed! Try Again.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';  
    exit();
}

if(isset($_GET['userexist']) && $_GET['userexist'] == true){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> Username Already Exist.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
    exit();
}
if(isset($_GET['passnotmatch']) && $_GET['passnotmatch'] == true){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> Password do not match. Please enter the same password .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>';
    exit();
}




if(isset($_GET['logout']) && $_GET['logout'] == true){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You have been logged out.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
  </div>';
  exit();
  }





if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == true){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You have been logged in.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
  </div>';
  exit();
  }
  if(isset($_GET['loginfailed']) && $_GET['loginfailed'] == true){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Failed!</strong> Invalid Credentials.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
  </div>';
  exit();
  }
?>
