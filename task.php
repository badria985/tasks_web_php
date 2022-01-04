<?php 

?>
<html>
    <table>
        <?php
        for($i=1 ; $i<9 ; $i++){
            echo "<tr>";
        for($j=1 ; $j<9 ; $j++){
            if(($j + $i) % 2 == 0){
                
                echo "<td style='background-color:white ;  width:50px ; height:50px'></td>";
            }else{
                echo "<td style='background-color:black; width:50px ; height:50px'></td>";
            }
           
        }
        echo "</tr>";
        }
        ?>
    </table>
    </html>