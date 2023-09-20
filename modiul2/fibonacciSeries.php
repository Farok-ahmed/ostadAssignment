<?php

function fibonacci($numbers){
    $veryOld= 0;
    $old = 1;
    $new = 1;
    for($i = 0; $i<= $numbers; $i++){
        echo $veryOld." ";
        $old = $new;
        $new = $veryOld + $old;
        $veryOld = $old;
    }
}

fibonacci(15);