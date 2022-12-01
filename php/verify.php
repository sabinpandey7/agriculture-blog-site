<?php
 session_start();

 if(!isset($_SESSION['id'])){
    die("not allowed");
 }
include_once('./connect.php');
$id = $_GET['id'];

$sql = "UPDATE posts set `status` = 1 WHERE id = '$id'";

if(mysqli_query($conn,$sql)){
      echo "success";     
}else echo mysqli_error($conn);

mysqli_close($conn);
?>