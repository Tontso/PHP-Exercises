<?php
    $alphabet = range('a', 'z');

    $word = strtolower(readline());
    $words = str_split($word);

    for ($i=0; $i <count($words) ; $i++) { 
        echo $words[$i] .' -> ' . array_search($words[$i] ,$alphabet) . PHP_EOL;
    }
?>