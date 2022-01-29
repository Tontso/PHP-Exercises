<?php
 
    $word = readline();

    $words = array_reverse(str_split($word));

    for ($i=0; $i <count($words) ; $i++) { 
        echo $words[$i] ;
    }
?>