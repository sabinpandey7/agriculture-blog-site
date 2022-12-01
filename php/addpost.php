<?php
  include_once('./connect.php');

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

   $title= test_input($_POST['title']);
   $author= test_input($_POST['author']);
   $description= test_input($_POST['description']);
   $image= "";
   $type= test_input($_POST['type']);

  if(isset($_FILES['image'])){

      $files = $_FILES['image'];
      
      $targetDir = 'photos/';
      $timestamp =time();
      $targetFile=$targetDir.$timestamp.basename($files['name']);
      $image = $targetFile;
      if(!move_uploaded_file($files['tmp_name'],"../".$targetFile)){
           die("error while uploading files");
        }
    }

    $sql = "INSERT INTO `posts` (`title`,`author`,`type`,`description`,`image`,`status`) VALUES ('$title','$author','$type','$description','$image',0) ";
          
    if(mysqli_query($conn,$sql)){
        echo 'Your post has been successfully sumbitted ! <a href="../" >Go Back TO Home</a>';
        exit(0);
      }
      else echo mysqli_error($conn);

      echo "Something went wrong ! please try again !!!"
?>