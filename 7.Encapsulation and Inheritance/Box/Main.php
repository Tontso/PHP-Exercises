<?php
require_once 'Box.php';

$length = intval(readline());
$width = intval(readline());
$height = intval(readline());


try{
    $box = new Box($length, $width, $height);
    echo $box;
} catch(Exception $ex){
    echo $ex->getMessage();
}
