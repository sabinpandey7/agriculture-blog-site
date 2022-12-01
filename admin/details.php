 <?php
  session_start();

  if(!isset($_SESSION['id'])){
     header("Location:./login.php");
  }
  
  include_once('../php/connect.php');
  if(isset($_GET['id']))
     $id = $_GET['id'];
  else 
  $id =0;
  $sql = "select * from posts where id='$id' ";
  $result=mysqli_query($conn,$sql);
  
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doons Ag</title>
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
              <a class="nav-link " href="./allblogs.php">All Blogs</a>
            </li>
          </ul>
          <form class="d-flex" action="./search.php
          " method="get">
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
  <div id="modal" class="d-none bg-light border rounded position-fixed text-center p-3" style="width: 300px;top:20%;transform: translateX(-50%);left:50%">
      <p>Are you sure want to delete ?</p>
      <button class="btn btn-danger" id="yes"> YES</button>
      <button class="btn btn-success" id="no">NO</button>
 </div>
  <div style="min-height: 90vh">
    <div class="container py-5">
       <?php
           if(mysqli_num_rows($result)>0){
             $row = mysqli_fetch_assoc($result);

             //for image
             $x=$row['image']!=''?$row['image']:'photos/blog.webp';
             //for verify or unverify 
             $y=$row['status']==0?"Verify":"Unverify";
             
             echo '
              <div>
                <h5 class="fs-2">'.$row['title'].'</h5>
                <div>
                   <button type="button" id="deleteBtn" data-id="'.$row['id'].'" class=" btn btn-danger ">Delete</button>
                   <button type="button" id="verifyBtn" data-status='.$row['status'].' class="btn btn-success ">'
                   .$y.'</button>
                </div>
                <div
                class="p-2 justify-content-between d-flex border-bottom text-dark"
                >
                <span style="font-size: 14px">Posted On : '.$row['date'].'</span>
                <span style="font-size: 14px">Posted By : '.$row['author'].'</span>
              </div>
            </div>
            <div class="container-fluid py-2">
              <img
              src="../'.$x.'"
              class="w-100"
              height="400px"
              style="object-fit: contain"
              alt=""
              />
            </div>
            <div class="container-fluid">
              '.htmlspecialchars_decode($row['description']).'
          </div>
          
          ';
        }else {
          echo '<div>
            <h2 class="text-success text-center">Something went wrong ! May id not found !!!</h2>
          </div>';
        }
        mysqli_close($conn);
        ?> 
        </div>
          </div>
          <footer>
          <div class="bg-success py-1 text-center text-light">
          <small> Developed By : CSE Student Batch (2019-2023) </small>
          </div>
          </footer>

          <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"
          ></script>
          <script src="./details.js">
          </script>
  </body>
</html>
