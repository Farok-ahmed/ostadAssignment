<?php

function replaceText($text){
    $text = strtolower($text);
    $search = "brown";
    $replace = "red";
    $text= str_replace($search, $replace, $text);
    echo $text;
}

$text = "The quick brown fox jumps over the lazy dog.";
replaceText($text);
