<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>NeatThreads - Forum</title>
  </head>
  <body>



    <!-- Getting Categories Data from Database -->
    <?php 
    // session_start();
    include "partials/_connect.php";
    include "partials/_header.php";
    $id = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET['catid'] : $_POST['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
    $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
      }
    ?>




      <!-- Add Questions into Database-->
      <?php
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['addThread'])){
        $th_title = $_POST['title'];
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = $_POST['desc'];
        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $id = $_POST['catid'];
        // $id = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET['catid'] : $_POST['catid'];
        $srn = $_POST['srn'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$srn', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy Success!</strong> Your thread has been added please wait community to response.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else{
          echo "Failed";
        }
      }
      ?>




    <!-- Show Category Information -->
    <div class="container my-2">
      <div class="jumbotron bg-dark">
        <h1 class="display-5 text-white">Welcome to <?php echo $catname; ?> Forum</h1>
        <p class="lead text-white"><?php echo $catdesc; ?></p>
        <hr class="my-4">
        <p style="color:white;">This is peer to peer discussion forum to share knowledge with each other. Forum Rules : 
          <br>1. No Spam / Advertising / Self-promote in the forums. <br>2. Do not post copyright-infringing material. <br>3.Do not post “offensive” posts, links or images. <br>4. Do not cross post questions. <br>5. Do not PM users asking for help. <br>6. Remain respectful of other members at all times.
        </p>
       
      </div>
    </div>





    <!-- Questions Box -->
    <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<div class="container">
    <h1 class="py-2">Ask a Question</h1>'.
    // <form action="' . $_SERVER["PHP_SELF"] . '" method="POST">
    // '<form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
    '<form action='.$_SERVER['PHP_SELF'].' method="POST">
    <div class="form-group">
    <label for="title">Your Question</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    <input type="hidden" class="form-control" id="catid" name="catid" value='.$id.'>
    <small id="emailHelp" class="form-text text-muted">Keep your title as short as possible.</small>
  </div>
  <div class="form-group">
    <label for="desc">Tell Us Your Concern</label>
    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    <input type="hidden" name="srn" value="' . $_SESSION["srn"] . '">
  </div>  
  <button type="submit" class="btn btn-primary" name="addThread">Submit</button>
</form>
    </div>';
      }
      else{
        echo '<div class="container">
                <p>You are not logged in. Login to Ask a Question.</p>
              </div>';
      }
    ?>
    



    <!-- Fetching and Showing Questions from Database -->
    <div class="container my-3">
      <h1 class="py-2">Browse Questions</h1>
      <?php
      $id = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET['catid'] : $_POST['catid'];
      $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
      $result = mysqli_query($conn, $sql);
      $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
          $title = $row['thread_title'];
          $desc = $row['thread_desc'];
          $id = $row['thread_id'];
          $thread_time = $row['timestamp'];
          $noResult = false;
          $thread_user_id = $row['thread_user_id'];
          $sql2 = "SELECT user_email FROM users WHERE srn = $thread_user_id";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          // var_dump($row2['user_email']);
      
        echo '<div class="media">
            <img src="images/userdefault.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
              <h5 class="mt-0"><a href="threads.php?threadid=' . $id .'">' . $title . '</a></h5>
              ' . $desc . '
            </div>
            <p class="font-weight-bold my-0">Asked By ' . $row2['user_email'] . ' at ' . $thread_time . '</p>
            </div>';
        }
        if($noResult){
          echo '<div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">No Threads Found</h1>
            <p class="lead">Be the first person to ask a question.</p>
          </div>
        </div>';
        }
      ?>
      
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>