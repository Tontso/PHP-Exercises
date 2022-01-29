<?php

    $numbers = explode(" ", readline());

    $valuesFrequent = array_count_values($numbers);

    $maxFrequent = max($valuesFrequent);
    
    // Find if there is one or more maxFrequent
    // Only for the print
    $maxValues = [];
    while($valueName = current($valuesFrequent)){
        if($valueName == $maxFrequent){
            array_push($maxValues, key($valuesFrequent));
        }
        next($valuesFrequent);
    }

    if(count($maxValues) == 1){
        echo "The number" . $maxValues[0] . "is the most frequent (occurs" . $maxFrequent . "times)";
    }else{
        echo "The numbers " . implode(", ",$maxValues) . " have the same maximal frequence (each occurs " . $maxFrequent . " times). The leftmost of them is " . $maxValues[0] . ".";
    }
?>