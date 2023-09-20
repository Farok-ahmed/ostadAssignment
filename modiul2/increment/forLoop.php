<?php

// for loop 

function evenNumber($start,$end,$step){
    if($start %2 !==0){
        $start++;
    }
    for($i = $start; $i <= $end; $i +=$step){
        echo $i." ";
    }
}
evenNumber(1,20,2);



