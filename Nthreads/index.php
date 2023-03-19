<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <style>
       body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
      } 

      
.card {
  background-color: #f5f5f5;
  border: 2px solid #e6e6e6;
  border-radius: 10px;
  padding: 10px;
  margin: 50px;
  width: 300px;
  height: 450px;
  transition: box-shadow 0.3s ease-in-out;
}
.carousel-item img {
  max-width: 800px;
  max-height: 400px;
        object-fit: cover;
        display: block;
  margin: 0 auto;
      }

.card:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  border: 2px solid #050505;
}

.card h2 {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 20px;
}

.card p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.card img {
  display: block;
  margin: 0 auto;
  width: 200px;
  height: 200px;
  object-fit: cover;
  border-radius: 50%;
}
.card-category .btn {
        background-color: #000000;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        padding: 10px 20px;
        margin-top: 10px;
        transition: background-color 0.2s ease-in-out;
      }

      .card-category .btn:hover {
        background-color: #5c5b5b;
      }
      .carousel-container {
  width: 800px;
  height: 400px;
}


  </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>NeatThreads - Forum</title>
  </head>
  <body>
    <?php include "partials/_connect.php"; ?>
    <?php include "partials/_header.php"; ?>

    <!-- Start Slider -->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php
          $sql = "SELECT * FROM `images`";
          $result = mysqli_query($conn, $sql);
          $i = 0;
          while($row = mysqli_fetch_assoc($result)){
            $imgp = $row['image_path'];
            echo '<div class="carousel-item';
            if($i == 0) {
              echo ' active';
            }
            echo '">
                    <img src="' . $imgp . '" class="d-block w-100" alt="...">
                  </div>';
            $i++;
          }
        ?>
      </div>
      <div class="carousel-item">
                <img src="<?php echo $imgp ?>" class="d-block w-100" alt="...">
            </div>
           
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- End Slider -->
    

    <div class="container my-3">
  <h2 class="text-center">NeatThreads - Browse Categories</h2>
  <div class="row">

  <!-- // fetch of the Categories -->
    <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];
        $imgp = $row['image_path'];
        echo '<div class="col-md-4 my-2">
                <div class="card card-category" style="width: 18rem;">
                  <img src="' . $imgp . '" width="200px" height="200px" class="card-img-top" alt="' . $cat . '">
                  <div class="card-body">
                    <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                    <p class="card-text">' . substr($desc, 0, 150) . '...</p>
                    <a href="threadlist.php?catid=' . $id . '" class="btn btn-dark">View Threads</a>
                  </div>
                </div>
              </div>';
      }
    ?>

  </div>  
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>