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
    <?php include "partials/_connect.php"; ?>
    <?php include "partials/_header.php"; ?>

    

    <!-- Search Results -->

    <div class="searchResult container my-3">
        <h1 class="py-2">Search Result for <em> " <?php echo $_GET["search"]; ?> " </em> </h1>

        <?php
    $noResults = true;
    $query = $_GET['search'];
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
    $where_clause = '';

    // If a category ID is selected, add a WHERE clause to the query
    if (!empty($category_id)) {
      $where_clause = "WHERE thread_cat_id = $category_id AND";
    }

    $sql = "SELECT * FROM `threads` $where_clause MATCH (thread_title, thread_desc) AGAINST ('$query')";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_id = $row['thread_id'];
        $url = "threads.php?threadid=".$thread_id;
        $noResults = false;

        echo '<div class="result container my-3">
        <h3 class="py-2"><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
        <p>'.$desc.'</p>     
        </div>';
    }

    if($noResults){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Results Found</h1>
          <p class="lead">Suggestions:<ul>
            <li>Make sure that all words are spelled correctly.</li>
            <li>Try different keywords.</li>
            <li>Try more general keywords.</li>
            <li>Try fewer keywords.</li></ul>
          </p>
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
