<?php
 $servername ="localhost";
 $username = "root";
 $password ="root";
 $dbname = "agsite";

  $conn=mysqli_connect($servername,$username,$password,$dbname);

  if(!$conn){
    die("Connection failed to database");
  }

?>