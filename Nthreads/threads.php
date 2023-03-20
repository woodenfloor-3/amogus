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
    <?php include "partials/_connect.php"; ?>
    <?php include "partials/_header.php"; ?>



    <!-- Fetching Threads Data -->
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
    $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        $sql2 = "SELECT user_email FROM users WHERE srn = $thread_user_id";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
      }
    ?>

    

    <!-- Adding Comment -->
    <?php
      $showAlert = false;
      // $method = $_SERVER['REQUEST_METHOD'];
      // if($method = 'POST'){
        if(isset($_POST['addComment'])){
        $comment = $_POST['comment'];

        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);

        $srn = $_POST['srn'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES ('$comment', '$id', current_time(), '$srn')";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy Success!</strong> Your Comment Has Beed Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
      }
      ?>




    <div class="container my-3">
      <div class="jumbotron bg-dark">
        
        <h1 class="display-4 text-white"><?php echo $title; ?></h1>
        <p id="desc" class="lead text-white"><?php echo $desc; ?></p>
        <button class="btn-copy" onclick="copyToClipboard()">Copy</button>
        <div id="notification"></div>
        <hr class="my-4">
        
        
        <p style="color:white;"><em> Posted by <?php echo $posted_by; ?> </em></p>
        
      </div>
    </div>
    <script>
function copyToClipboard() {
  var desc = document.getElementById("desc");
  var range = document.createRange();
  range.selectNode(desc);
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(range);
  document.execCommand("copy");
  window.getSelection().removeAllRanges();
    // Display alert message after copying
    alert("Content copied to clipboard!");
}

</script>
<style>
.btn-copy {
  border: none;
  background: #f8f9fa;
  color: #212529;
  cursor: pointer;
  font-size: 14px;
  padding: 8px 16px;
  border-radius: 4px;
}

.btn-copy:hover {
  background: #e9ecef;
}
</style>


    <!-- Comment Box -->
    <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
    echo '<div class="container">
    <h1 class="py-2">Post a Comment</h1>
    <form action="' . $_SERVER['REQUEST_URI'] .'" method=post>
      <div class="form-group">
        <label for="desc">Type Your Comment</label>
        <textarea class="form-control" id="desc" name="comment" rows="3"></textarea>
        <input type="hidden" name="srn" value="' . $_SESSION["srn"] . '">
      </div>  
      <button type="submit" class="btn btn-primary" name="addComment">Post Comment</button>
    </form>
  </div>';
      }
      else{
        echo '<div class="container">
                <h1 class="py-2">Post a Comment</h1>
                <p>You are not logged in. Please Login to be able to Post a Comment.</p>
              </div>';
      }
    ?>





    <!-- Fetching and Showing Comment Data and User Data-->
    <div class="container my-3">
      <h1 class="py-2">Discussion</h1>
      <?php
      $id = $_GET['threadid'];
      $sql = "SELECT * FROM `comments` WHERE `thread_id` = $id";
      $result = mysqli_query($conn, $sql);
      $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
          $content = $row['comment_content'];
          $id = $row['comment_id'];
          $comment_time = $row['comment_time'];
          $noResult = false;
          $comment_by = $row['comment_by'];

          $sql2 = "SELECT user_email FROM users WHERE srn = $comment_by";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
      
        echo '<div class="media">
        <img src="' . $row2['user_image'] . '" width="54px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">' . $row2['user_email'] . ' at ' . $comment_time . '</p>
            ' . $content . '</div>
            </div>';
        }
        if($noResult){
          echo '<div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">No Comments Found</h1>
            <p class="lead">Be the first person to comment.</p>
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
