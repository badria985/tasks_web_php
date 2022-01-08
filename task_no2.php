<?php
function nextChar($char){
  $result = ++$char ;
    // if we have a result will be b
    // if we have z result will be aa
if(strlen($result)>1){
    $newresult = $result[0] ; 
    echo $newresult ;
}
else{
    echo $result . "<br>";
}

}
nextChar('a') ; // input = a , output = b
nextChar('z') ; // input = z , output = a 
?>