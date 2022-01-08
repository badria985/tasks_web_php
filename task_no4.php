<?php
// start session 
session_start();

// first step : clean
//second step : validate

function clean_input($input){
    $input = trim($input);
    $input = strip_tags($input);
    $input = stripslashes($input);
    return $input ;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$name     = clean_input($_POST['name']);
$email    = clean_input($_POST['email']);
$password = clean_input($_POST['password']);
$address  = clean_input($_POST['address']);
$url      = clean_input($_POST['lin_url']);
$gender   = $_POST['gender'];
$errors   =[]; 

// validate name (required , string)
if(empty($name)){
    $errors['name'] = "field is required ";
}elseif(!preg_match ("/^[a-zA-z]*$/", $name)){
    $errors['name'] = "name is unallowed ";
}

//validate email (required , email)
if(empty($email)){
    $errors['email'] = "field is required ";
}elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
    $errors['email'] = " email is written wrong ";
}

//validate password (required , min = 6)
if(empty($password)){
    $errors['password'] = "field is required ";
}elseif(strlen($password) < 6){
    $errors['password'] = "password is too short ";
}

//validate address (required , length = 10chars)
if(empty($address)){
    $errors['address'] = "field is required ";
}elseif(strlen($address)>10){
    $errors['address'] = " address is too long ";
}

//validate linkedin url (required , url)
if(empty($url)){
    $errors['lin_url'] = "field is required ";
}elseif(!filter_var($url , FILTER_VALIDATE_URL)){
    $errors['lin_url'] = " URL is written wrong ";
}

//validate gender (required)
if(empty($gender)){
    $errors['Gender'] = "field is required ";
}

//validate profile image 
// take some info 
if(!empty($_FILES['image']['name'])){
     $imageName  = $_FILES['image']['name'];
     $imagetemp  = $_FILES['image']['tmp_name'];
     $imagesize  = $_FILES['image']['size'];
     $imagetype  = $_FILES['image']['type'];
     $ext        = explode('.',$imageName);   // no use 
     $imgext     = strtolower(end($ext));     // use
     $allowedext = ['png' , 'jpg' , 'jpeg' , 'gif'];
if(in_array($imgext , $allowedext)){

    $newName = rand() . time() . '.' . $imgext ;
    $despath = './uploads/' . $newName ;
    if(move_uploaded_file($imagetemp , $despath)){
        echo "image upload" ;
        $_SESSION['imag'] = $despath;
        
    }else{
       $errors['img'] = 'something wrong';
    }
}else{
    $errors['img'] =  "extension not allowed " ;
}

}else{
    $errors['img'] =  'image field is required' ; 
}







$_SESSION['name'] = $name ;
$_SESSION['email'] = $email ;
$_SESSION['address'] = $address;
$_SESSION['gender'] = $gender ;
$_SESSION['url'] = $url ;

















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
    
     <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="post" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <div ><?php if(isset($errors) && (!empty($errors['name']))){echo '||' . $errors['name'];} ?></div><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br>
        <div ><?php if(isset($errors) && (!empty($errors['email']))){echo '||' . $errors['email'];} ?></div><br>

        <label>Password:</label><br>
        <input type="text" name="password"><br>
        <div ><?php if(isset($errors) && (!empty($errors['password']))){echo '||' . $errors['password'];} ?></div><br>

        <label>Address:</label><br>
        <input type="text" name="address"><br>
        <div ><?php if(isset($errors) && (!empty($errors['address']))){echo '||' . $errors['address'];} ?></div><br>
        
        <label>Linkedin:</label><br>
        <input type="text" name="lin_url"><br>
        <div ><?php if(isset($errors) && (!empty($errors['lin_url']))){echo '||' . $errors['lin_url'];} ?></div><br>
       
        <input type="radio" name="gender" value="Male">
          <label>Male</label>
          <input type="radio" name="gender" value="Female">
          <label>Female</label><br>
        <div ><?php if(!empty($errors['Gender'])){echo '||' . $errors['Gender'];} ?></div><br>

        <label>image : </label><br>
        <input type = 'file' name = 'image' ><br>
        <div ><?php if(isset($errors) && (!empty($errors['img']))){echo '||' . $errors['img'];} ?></div><br>

        <button type = 'submit'>Submit</button>
     </form>
</html>