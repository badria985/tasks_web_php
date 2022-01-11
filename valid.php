<?php 
  // clean data 
  function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    return $data ; 
}

$title   = clean_input($_POST['title']); 
$content = clean_input($_POST['content']);
$date = $_POST['date']; 
$errors  = []; 

// validate title (required , string)
if(empty($title)){
      $errors['title']  = " field is required ";
}elseif(!preg_match ("/^[a-zA-z]*$/" , $title)){
      $errors['title']  = "title must be string only" ;
}

//validate content ( required , length > 50 char)
if(empty($content)){
   $errors['content'] = "field is required" ;
}elseif(strlen($content) <50){
   $errors['content'] = "content is too small" ;
}

//validate image 
if(!empty($_FILES['image']['name'])){
   $imageName  = $_FILES['image']['name'];
   $imagetemp  = $_FILES['image']['tmp_name'];
   $imagesize  = $_FILES['image']['size'];
   $imagetype  = $_FILES['image']['type'];
   $ext        = explode('.',$imageName);   // output is array
   $imgext     = strtolower(end($ext));     
   $allowedext = ['png' , 'jpg' , 'jpeg' , 'gif'];
   if(in_array($imgext , $allowedext)){
     $newName = rand() . time() . "." . $imgext ;
     $despath = './uploads/' . $newName ;
     if(move_uploaded_file($imagetemp , $despath)){
            echo " image uploaded " ;
     }else{
         $errors['imag'] = "something wrong" ;
     }
   }else{
         $errors['imag'] = "extensions not allowed ";
   }
}else{
   $errors['imag'] = "field is required" ;
}

// validate date(required , date)
if(empty($date)){
    $errors['date'] = "field is required";
}








?>