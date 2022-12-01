<?php
  include_once('./php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maya Ag</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <style>
    .schemes :nth-child(2n-1){
      flex-direction: row-reverse;
    }
  </style>
  <body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container-fluid">
        <a class="navbar-brand" href="./">Maya AG</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./schemas.php">Schemes</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="./blogs.php">Blogs</a>
            </li>
          </ul>
          <form class="d-flex" action="./search.php" method="get">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="query"
            />
            <button class="btn btn-warning" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <div style="min-height:90vh;">
      <!-- corousel -->
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://images.pexels.com/photos/2131784/pexels-photo-2131784.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              class="d-block w-100"
              style="height: 55vh; object-fit: cover"
              alt="..."
            />
            <div class="carousel-caption d-block d-md-block">
              <!-- <h5 class="text-warning fs-1">Agriculture</h5>
              <p class="fw-bold fs-6">
                Is The Most Healthful,Most Useful And Most Nobel Employment Of
                Man
              </p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.pexels.com/photos/2153824/pexels-photo-2153824.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              class="d-block w-100"
              style="height: 55vh; object-fit: cover"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="container  my-4">
        <div class="p-2 d-flex flex-column align-items-center">
          <h3 class="text-success text-center ">Top Agriculture Schemes</h3>
          <div class="col-md-10 schemes " >
            <?php
              $sql = "select * from posts where type='scheme' and status=1  limit 5";
              $result=mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                   echo '
                   <div class="align-items-center p-2 d-flex">
                   <div class="col-6 text-center">
                       <h3 class="fs-2">'.$row['title'].'</h3>
                       <a href="./details.php?id='.$row['id'].'" class="btn btn-outline-success mt-3" >Read more</a>
                   </div>
           
                   <div class="col-6">
                      <img class="img-thumnail img-fluid" height="100px" src="'.$row['image'].'" alt="">
                   </div>
                   
               </div>';
                }
              }
            ?>
          </div>
        </div>
        <!-- <div class="col-md-5 p-2">
          <h3 class="text-success">Blogs</h3>
          <div class="list-group-flush">
          <?php
              $sql = "select * from posts where type='blog' and status=1 order by id DESC LIMIT 5";
              $result=mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                   echo '
                   <a class="list-group-item fst-italic text-primary"  href="./details.php?id='.$row["id"].'" >
                     '.$row['title'].'</a>';
                }
              }
              mysqli_close($conn);
            ?>
          </div>
        </div> -->
      </div>
      <div class="bg-light border text-center p-5  ">
           <h5 class="text-success mb-3">Do you have anything to post here?</h3>
           <a href="./create.php" class="btn btn-warning">Submit Your Article</a>
      </div>
    </div>

    <footer>
      <div class="bg-success py-1 text-center text-light ">
        <small> Developed By : CSE Student Batch (2019-2023) </small>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
