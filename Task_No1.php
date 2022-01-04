<?php
$unit = 60;
$elec_bill="";
if( $unit <= 50 ){
    $elec_bill = $unit * 3.5 ;
    echo "the electricity bill is = " . $elec_bill ; 
}elseif( $unit > 50 && $unit <= 150){
    $elec_bill = ($unit * 4) ;
    echo "the electricity bill is = " . $elec_bill; 
}elseif($unit > 150){
    $elec_bill = ($unit * 6.5) ;
    echo "the electricity bill is = " . $elec_bill; 
}
?>