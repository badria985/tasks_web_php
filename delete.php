<?php
require 'dbconnection.php';
$id = $_GET['id'];
$sql = "select * from blog where id = $id ";
 $op = mysqli_query($con,$sql);

  if( mysqli_num_rows($op) == 1){
     
     $sql_de = "delete from blog where id = $id";

     $op_de  = mysqli_query($con,$sql_de);
     if($op_de){
        $message =  "Raw Deleted";
     }else{
        $message =  'Error try Again';
     }


  }else{
       $message =  "Invalid Id ";
  }


   $_SESSION['message'] = $message;

   header("location: indextask6.php");
?>