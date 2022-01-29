<?php

$matrixSize = array_map("intval", explode(", ", readline()));

$rowSize = $matrixSize[0];
$colSize = $matrixSize[1];


for ($row=0; $row < $rowSize; $row++) { 
    $matrix[$row] = array_map("intval" ,explode(", ", readline()));
}

print_r($matrix);