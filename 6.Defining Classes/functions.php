<?php

$number = intval(readline());
$operations = explode(', ',readline());

foreach($operations as $operation) {
    if($operation == 'chop') { echo customChop($number) . PHP_EOL;};
    if($operation == 'dice') { echo dice($number) . PHP_EOL;};
    if($operation == 'spice') { echo spice($number) . PHP_EOL;};
    if($operation == 'bake') { echo bake($number) . PHP_EOL;};
    if($operation == 'fillet') { echo fillet($number) . PHP_EOL;};
}


function customChop(int &$number): int
{
    $number /= 2;
    return $number;
}

function dice(int &$number): int 
{
    $number = sqrt($number);
    return $number;
}

function spice(int &$number): int 
{
    $number += 1;
    return $number;
}

function bake(int &$number): int 
{
    $number *= 3;
    return $number;
}

function fillet(int &$number): float 
{
    $number -= ($number*0.2);
    return $number;
}