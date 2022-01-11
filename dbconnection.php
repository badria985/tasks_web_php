<?php
session_start();
  // to open connect between (db , php) => 4 variables
  $server     = "localhost" ;
  $dbuser     = "root" ;   //default
  $dbpassword = "";        //default
  $dbname     = "group10";  // change

  // to connect
  $con = mysqli_connect($server , $dbuser , $dbpassword , $dbname) ;         //must be that order
  
  // check connection
  if($con){
    //    echo "connected" ;
  }else{
      die('Error : ' . mysqli_connect_error());
  }

?>