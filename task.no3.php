<?php 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $address = $_POST['address'];
       $lin_url = $_POST['lin_url'];
       $mark = '@';
       $errors = [];

       // validate name 
       if( empty($name) ){
           $errors['name'] = 'field is required';
       }else if( (is_string($name)) !== 1 ){
        $errors['name'] = 'must be string';
       }

       // validate email 
       if( empty($email) ){
        $errors['email'] = 'field is required';
       }elseif(strpos($email ,$mark ) == false){
        $errors['email'] = 'must have @ mark';
       }

       // validate password 
       if(empty($password)){
        $errors['password'] = 'field is required';
       }elseif(strlen($password) < 6){
        $errors['password'] = 'must be more than 6';
       }

       //validate address
       if(empty($address)  ){
        $errors['address'] = 'field is required';
       }elseif( strlen($address) > 10){
        $errors['address'] = 'must be 10 ';
       }

       //validate url
       if(empty($lin_url)){
        $errors['lin_url'] = 'field is required';
       }
       if(count($errors) > 0){
           foreach($errors as $key => $val){
               echo $key . "||" . $val ."<br>" ;
           }
           }else{
            echo "valid code";
       }
   }
?>


<html>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ; ?>">
  <label>name:</label><br>
  <input type="text" name="name"><br>

  <label>email:</label><br>
  <input type="text" name="email"><br>

  <label>password:</label><br>
  <input type="password" name="password"><br>

  <label>address:</label><br>
  <input type="text" name="address"><br>

  <label>linkedin_url:</label><br>
  <input type="text" name="lin_url"><br>

  <input type="submit" value="Submit">
</form> 
</html>