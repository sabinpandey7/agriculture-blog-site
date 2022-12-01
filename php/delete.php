<?php
   session_start();

   if(!isset($_SESSION['id'])){
      die("not allowed");
   }

   include_once('./connect.php');
   $id = $_GET['id'];
   
   $sql = "SELECT * FROM posts where id ='$id'";
    
   $result =mysqli_query($conn,$sql);
 
    if(mysqli_num_rows($result)>0){
         $row = mysqli_fetch_assoc($result);

         if($row['image']!=""){
            unlink("../".$row['image']);
         }
    }

   $sql = "DELETE from posts WHERE id = '$id'";

   if(mysqli_query($conn,$sql)){
         echo "deleted";     
   }else echo mysqli_error($conn);

   mysqli_close($conn);
?>