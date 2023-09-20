<?php
//  while loop

function evenNumber($start,$end,$step){
    if($start %2!==0){
        $start++;
    }
    $i = $start;
    while($i<=$end){
        echo $i." ";
        $i +=$step;
    }

}

evenNumber(1,20,2);