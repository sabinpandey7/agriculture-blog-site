<?php
   session_start();
   
   if(isset($_SESSION['id'])){
     header("Location:./");
    }
    $error ='';
    include_once('../php/connect.php');
   if($_SERVER["REQUEST_METHOD"]=="POST"){
       $username = mysqli_real_escape_string ($conn,$_POST['username']);
       $password = mysqli_real_escape_string($conn,$_POST['password']);

       $sql = "SELECT * FROM admin where username ='$username' and password = '$password'";

       $result = mysqli_query($conn,$sql); 

       if(mysqli_num_rows($result)>0){
           
          $row = mysqli_fetch_assoc($result);          
          $_SESSION['id']= $row['id'];
           
          header('Location:./');

       }
       else{
        $error ="Username or Password doesn't matched";
       }

   }
  
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
    <div class="container d-flex justify-content-center align-items-center w-100 " style="height: 100vh;">
      <form class="bg-success p-3 rounded " action="./login.php" method="POST" >
          <p class="text-warning fs-6"><?php echo $error ; ?></p>
            <div class="mb-3">
              <label for="username" class="form-label text-light">Username</label>
              <input type="text" class="form-control" id="username" required name="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label text-light">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
