<?php
require 'dbconnection.php';
$id= $_GET['id'];
//select data from DB to write it in form
$sql = "select * from blog where id = $id ";
$op = mysqli_query($con, $sql);
if (mysqli_num_rows($op) == 1) {
    $data = mysqli_fetch_assoc($op);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: indextask6.php'); 
}
  $file = $data['image'];
  echo $file ;
//update data from your form and set it in DB
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   include 'valid.php';
   $sql_up = "update blog set title='$title' , content = '$content' , date = '$date' , image = '$newName'  where id = $id "; 
   $op_up  = mysqli_query($con,$sql_up);
// delete image from folder
   unlink('./uploads/' . $file);

   if($op_up){
    $message = "Raw Updated";
    }else{
        $message = "Error Try Again ".mysqli_error($con) ;
    }

    $_SESSION['message'] = $message;
    header("Location: indextask6.php");                    

    
}

?>
<html>
    <head>
        <style>
            div{
                color:red;
            }
        </style>
     </head>
    <form method="post" action="update.php?id=<?php  echo $data['id'] ?>" enctype="multipart/form-data">
        <label> Title : </label><br>
        <input type="text" name="title" value="<?php echo $data['title'] ?>"><br>
        <div><?php if(isset($errors) && (!empty($errors['title']))){echo "  || " . $errors['title'] ;} ?></div>

        <label> Content : </label><br>
        <input style="height:39px;" type="text" name="content" value="<?php echo $data['content'] ?>"><br>
        <div><?php if(isset($errors) && (!empty($errors['content']))){echo "  || " . $errors['content'] ;} ?></div>


        <label> Date :</label><br>
        <input type="date" name="date" value="<?php echo $data['date'] ?>"><br>
        <div><?php if(isset($errors) && !empty($errors['date'])){echo $errors['date'] ;} ?></div><br></div>

        <label> Image </label><br>
        <input type="file" name="image"><br>
        <input type="hidden" name="image_old" value="<?php echo $data['image'] ?>">
        <div><?php if(isset($errors) && (!empty($errors['imag']))){echo "  || " . $errors['imag'] ;} ?></div><br>

        <button type="submit">Update</button>

    </form>
</html>