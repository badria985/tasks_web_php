<?php
$file = fopen('task5.txt' , 'r') or die ('unable to open file') ;

while(! feof($file)){

    ?>
    <div style= "background-color : lightblue ; margin : 15px ;">
    <?php echo fgets($file) . "<br>"; ?>
    <button>delete</button>
    </div>
    
   
 <?php
}


fclose($file) ;
?>
