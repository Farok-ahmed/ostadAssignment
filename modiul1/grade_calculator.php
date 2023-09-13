<?php

$bangla = 105;
$english = 0;
$math = 80;

$average = ($bangla + $english + $math) / 3;

echo 'Average = '.$average;
echo PHP_EOL;

if ($average <= 100 && $average >= 80) {
    echo 'Grade = A';
} elseif ($average <= 79 && $average >= 60) {
    echo 'Grade = B';
} elseif ($average <= 59 && $average >= 50) {
    echo 'Grade = C';
} elseif ($average <= 49 && $average >= 40) {
    echo 'Grade = D';
} elseif ($average <= 39 && $average >= 33) {
    echo 'Grade = E';
} else {
    echo 'Grade = F';
}
