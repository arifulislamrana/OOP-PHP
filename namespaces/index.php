<?php

include 'test1.php';
include 'test2.php';
 
use test2;
use test2\A;

$obj = new A; //refers to test2
$obj2 = new test2\A; //refers to test2

$obj3 = new \A; //refers to test1

?>