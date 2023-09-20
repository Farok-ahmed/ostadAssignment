<?php

$veryOld = 0;
$old = 1;
$new = 1;
for($i=0; $i<=50; $i++){

    if($veryOld>100){
        break;
    }
    echo $veryOld." ";
    $old = $new;
    $new = $veryOld + $old;
    $veryOld = $old;
}