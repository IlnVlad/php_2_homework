<?php

use Class1\Class1;
use Class2\Class2;
use Class3\Class_3;

spl_autoload_register(function ($className) {
    $dirStr = str_replace(['_', '\\'], DIRECTORY_SEPARATOR, $className) . ".php";
    if (file_exists($dirStr)) {
        require $dirStr;
    };
});

$class1 = new Class1("Класс 1");
$class2 = new Class2("Класс 2");
$class3 = new Class_3("Класс 3 с '_' в названии");

echo $class1->getText() . PHP_EOL . $class2->getText() . PHP_EOL . $class3->getText();
