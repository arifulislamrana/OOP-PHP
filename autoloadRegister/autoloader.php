<?php

// spl_autoload_register('myAutoloader');

// function myAutoloader($className)
// {
//     $path = '/path/to/class/';

//     include $path.$className.'.php';
// }


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$c = new A();
echo '<br>';
$c = new B();
echo '<br>';
$c = new C();
?>