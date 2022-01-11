<?php 
require 'dbconnection.php';
$id = $_GET['id'];
$sql = "select * from blog where id = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    
    $new_data = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: indextask6.php');
}






if($_SERVER['REQUEST_METHOD'] == 'POST'){

 include 'valid.php';
 $sql = "update blog set title='$title' , content = '$content' , date='$date'  where id  = $id"; 

    $op  = mysqli_query($con,$sql);

    if($op){
        $Message = "Raw Updated";
    }else{
        $Message = "Error Try Again ".mysqli_error($con) ;
    }

    $_SESSION['Message'] = $Message;
    header("Location: indextask6.php");

}
?>
<html>
<head>
         <style>
             div{
                 color : red ;
             }
         </style>
     </head>
<h3>Update Data :</h3>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" method = "post" enctype="multipart/form-data">
         <label> Title : </label><br>
         <input type ="text" name="title" value="<?php echo $new_data['title']; ?>" ><br>
         <div><?php if(isset($errors) && (!empty($errors['title']))){echo "  || " . $errors['title'] ;} ?></div>

         <label> Content : </label><br>
         <textarea rows="4" name="content" value="<?php echo $new_data['content']; ?>"></textarea><br>
         <div><?php if(isset($errors) && (!empty($errors['content']))){echo "  || " . $errors['content'] ;} ?></div>

         <label> Image : </label><br>
         <input type ="file" name="image"><br>
         <div><?php if(isset($errors) && (!empty($errors['imag']))){echo "  || " . $errors['imag'] ;} ?></div>

         <label>Date : </label><br>
         <input type = "text" name="date" placeholder="mm/dd/yyyy" value="<?php echo $new_data['date']; ?>">
         <div><?php if(isset($errors) && !empty($errors['date'])){echo $errors['date'] ;} ?></div><br>

         <button type ="submit">create</button>
     </form>
</html>