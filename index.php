<?php

require 'vendor/autoload.php';


$connect = new Connect();


$daoPeople = new DaoPeople($connect);

/*
$people = new People();
$people->setName('Ministro Tarcisio de Freitas');

var_dump($daoPeople->insert($people));
*/

$people = new People();
$people->setId(2);
$people->setName('Ministro da Saúde Pauzelo');

print_r($daoPeople->update($people));
