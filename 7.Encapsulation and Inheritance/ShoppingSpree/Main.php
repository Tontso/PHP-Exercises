<?php

require_once 'Person.php';
require_once 'Product.php';

$clients = [];
$products = [];

$firstRow = readline();
$secondRow = readline();

getData($clients, $firstRow, 'Person');
getData($products, $secondRow, 'Product');

var_dump($clients);
var_dump($products);


function getData(array &$dataArray, string $input, string $type) : void
{
    $datas = explode(';', $input, -1);
    foreach($datas as $data){
        [$name, $moneyOrCost] = explode('=', $data);
        if($type == 'Person'){
            $dataArray[] = new Person($name, $moneyOrCost);
        } else{
            $dataArray[] = new Product($name, $moneyOrCost);
        }
    }
}