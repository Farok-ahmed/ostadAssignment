<?php

function generatePassword($length){
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
    $password = '';
    $chrCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $rendomIndex = mt_rand(0, $chrCount - 1);
        $password .= $characters[$rendomIndex];
    }
    echo $password;
}
$length = 12;
generatePassword($length);


