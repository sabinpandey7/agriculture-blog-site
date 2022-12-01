<?php
   include_once('../php/connect.php');
   session_start();
   
   if(!isset($_SESSION['id'])){
      header("Location:./login.php");
   }
   if(isset($_GET['page'])){
     $page = $_GET['page'];
   }else{
     $page = 1;
   }
   $offset=($page-1)*7;
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
              <a class="nav-link " href="./newblogs.php">New Blogs</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="./allblogs.php">All Blogs</a>
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
      <div class="container py-5">
        <h3 class="">Latest Blogs</h3>
        <div class="list-group list-flush">
         <div class="list-group-flush">
         <?php
              
              $sql= "select * from posts where  status=1 ;";
              $result=mysqli_query($conn,$sql);
              $total = mysqli_num_rows($result);
              $pageCount =ceil(($total)/7);

              $sql = "select * from posts where  status=1 order by id DESC limit 7 OFFSET $offset";
              $result=mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                   echo '
                   <a class="list-group-item"  href="./details.php?id='.$row["id"].'" >
                      <div class="text-primary fs-4">
                      '.$row['title'].'
                      </div>
                     <div class="fw-lighter fs-6">Posted on '.$row['date'].'</div>
                     </a>';
                }
              }
              mysqli_close($conn);
            ?>
         </div>
        </div>

      </div>
      <div class="container d-flex justify-content-between mb-2">
        <?php 
          if($page>1)
           echo '<a href="./allblogs.php?page='.($page-1).'" class="btn btn-success">Prev</a>';
         ?>
        <?php 
          if($page<$pageCount)
           echo '<a <a href="./allblogs.php?page='.($page+1).'"  type="button" class="btn btn-success" >Next</a>';
         ?>
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