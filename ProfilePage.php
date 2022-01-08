<?php
// session start 
session_start();
?>
<html>
    <head>
        <style>
            span{
                font-weight : bold ; 
                color : red ; 
            }
        </style>
    </head>
      <div class = 'father'>
          <div><img src="<?php echo $_SESSION['imag'] ; ?>" style = "width : 150px ; height:150px ; border-radius : 50%"></div>
          <div> <span>Name is :</span> <?php echo $_SESSION['name'] ; ?></div>
          <div><span> Email is : </span> <?php echo $_SESSION['email'] ; ?></div>
          <div><span> Address is :</span> <?php echo $_SESSION['address'] ; ?></div>
          <div><span> Gender is :</span> <?php echo $_SESSION['gender'] ; ?></div>
          <div><span> URL is : </span><?php echo $_SESSION['url'] ; ?></div>
      </div>    
</html>