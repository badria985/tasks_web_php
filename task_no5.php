<?php
     // clean data 
     function clean_input($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = strip_tags($data);
         return $data ; 
     }
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $title   = clean_input($_POST['title']); 
     $content = clean_input($_POST['content']);
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

    $file = fopen('task5.txt' , 'a') or die ('unable to open file') ; 
    $topic_details = $title . " || " . $content . " || " . $despath  . "\n" ;
    fwrite($file , $topic_details) ; 
     fclose($file);


















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
     <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method = "post" enctype="multipart/form-data">
         <label> Title : </label><br>
         <input type ="text" name="title" ><br>
         <div><?php if(isset($errors) && (!empty($errors['title']))){echo "  || " . $errors['title'] ;} ?></div>

         <label> Content : </label><br>
         <textarea rows="4" name="content"></textarea><br>
         <div><?php if(isset($errors) && (!empty($errors['content']))){echo "  || " . $errors['content'] ;} ?></div>

         <label> Image : </label><br>
         <input type ="file" name="image"><br><br>
         <div><?php if(isset($errors) && (!empty($errors['imag']))){echo "  || " . $errors['imag'] ;} ?></div>

         <button type ="submit">Submit</button>
     </form>
 </html>