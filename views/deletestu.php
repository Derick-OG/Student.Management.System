<?php
include_once '../dbconnect.php';
if(isset($_GET['deleteid'])){
  $id= $_GET['deleteid'];
  $sql= "DELETE FROM studentdb WHERE studentid= $id";
  $result= mysqli_query($conn, $sql);
  if($result){
    header('location:../index.php');

  }

}



?>