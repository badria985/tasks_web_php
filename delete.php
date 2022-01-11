<?php 
require 'dbconnection.php';
  
$id = $_GET['id'];

 
 $sql = "select * from blog where id = $id ";
 $info = mysqli_query($con,$sql);

  if( mysqli_num_rows($info) == 1){
     
     $sql = "delete from blog where id = $id";

     $op  = mysqli_query($con,$sql);
     if($op){
        $Message =  "Raw Deleted";
     }else{
        $Message =  'Error try Again';
     }


  }else{
       $Message =  "Invalid Id ";
  }


   $_SESSION['Message'] = $Message;

   header("location: indextask6.php");


?>