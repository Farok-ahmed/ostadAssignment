<?php



// do while loop

function evenNumber($start,$end,$step){
    if($start %2!== 0){
        $start++;
    }
    $i = $start;
    do {
        echo $i." ";
        $i +=$step;
    } while ($i<=$end);
}

evenNumber(1,20,2);