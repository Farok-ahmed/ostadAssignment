<?php
function isOdd($numbers){
   
    foreach ($numbers as $key=>$number) {
        if ($number % 2 == 0) {
           unset($numbers[$key]);
        }
    }
  return $numbers;
}
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$numbers = isOdd($numbers);
print_r($numbers);