<?php 
require 'dbconnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

include 'valid.php';

//create new data in DB
$sql =" insert into blog(title,content,date,image)values('$title','$content','$date','$newName')" ;
//execute query line
$op = mysqli_query($con,$sql);
if($op){
    $message = "Row inserted";
}else{
    $message = "Error" . mysqli_error($con);
}


$_SESSION['message'] = $message;
echo $_SESSION['message'];


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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" enctype="multipart/form-data">
        <label> Title : </label><br>
        <input type="text" name="title"><br>
        <div><?php if(isset($errors) && (!empty($errors['title']))){echo "  || " . $errors['title'] ;} ?></div>

        <label> Content : </label><br>
        <textarea name="content" rows="3"></textarea><br>
        <div><?php if(isset($errors) && (!empty($errors['content']))){echo "  || " . $errors['content'] ;} ?></div>


        <label> Date :</label><br>
        <input type="date" name="date"><br>
        <div><?php if(isset($errors) && !empty($errors['date'])){echo $errors['date'] ;} ?></div><br></div>

        <label> Image </label><br>
        <input type="file" name="image"><br>
        <div><?php if(isset($errors) && (!empty($errors['imag']))){echo "  || " . $errors['imag'] ;} ?></div><br>

        <button type="submit">Create</button>

    </form>
</html>