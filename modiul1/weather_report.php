<?php

$temperature = 29;

if ($temperature <= 0) {
    echo "It's freezing!";
} elseif ($temperature <= 15 && $temperature >= 0) {
    echo "It's cool!";
} elseif ($temperature >= 15 && $temperature <= 28) {
    echo "It's worm!";
} else {
    echo "It's Hot";
}
