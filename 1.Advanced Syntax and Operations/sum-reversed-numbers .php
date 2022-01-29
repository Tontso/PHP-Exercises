<?php
 
    $word = readline();

    $words = explode(" ",$word);

    $sum = 0;
    for ($i=0; $i <count($words) ; $i++) { 
        $sum += intval(strrev($words[$i]));
    }
    echo $sum;
?>