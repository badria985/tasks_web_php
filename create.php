<?php 
require 'dbconnection.php';



if($_SERVER['REQUEST_METHOD'] == "POST"){    
require 'valid.php';



$sql = "insert into blog (title,content,date,image) values ('$title','$content','$date','$imageName')";

$op = mysqli_query($con, $sql);

if ($op) {
    $Message = 'Raw Inserted';
} else {
    $Message = 'Error try Again : ' . mysqli_error($con);
}

$_SESSION['Message'] = $Message;

header('Location: indextask6.php');


}

?>



<!DOCTYPE html>
<html>

<head>
<head>
         <style>
             div{
                 color : red ;
             }
         </style>
     </head>
  <title>task6</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" method = "post" enctype="multipart/form-data">
         <label> Title : </label><br>
         <input type ="text" name="title" ><br>
         <div><?php if(isset($errors) && (!empty($errors['title']))){echo "  || " . $errors['title'] ;} ?></div>

         <label> Content : </label><br>
         <textarea rows="4" name="content"></textarea><br>
         <div><?php if(isset($errors) && (!empty($errors['content']))){echo "  || " . $errors['content'] ;} ?></div>

         <label> Image : </label><br>
         <input type ="file" name="image"><br>
         <div><?php if(isset($errors) && (!empty($errors['imag']))){echo "  || " . $errors['imag'] ;} ?></div>

         <label>Date : </label><br>
         <input type = "date" name="date" placeholder="mm/dd/yyyy">
         <div><?php if(isset($errors) && !empty($errors['date'])){echo $errors['date'] ;} ?></div><br>

         <button type ="submit">create</button>
     </form>


</div>
</body>
</html>