<?php

require_once 'autoload.php';

use Common\ExceptionTest;
use DesignPattern\DecoratorPattern;
use DesignPattern\ObserverPattern;

//(new InheCompoAggre())();

//(new Factory())();

//$stream = fopen('php://stdin', 'rb');
//
//while (true) {
//    $command = trim(fgets($stream));
//    if ($command === 'exit') {
//        break;
//    }
//    $commands[] = $command;
//}
//
//\Support\Helper::res($commands);

//use DesignPattern\AbstractFactory;
//
//(new AbstractFactory())();

//(new AdapterPattern())();

//set_exception_handler(static function (Exception $e) {
//    echo 1;
//});
//
//(new ExceptionTest())->test();

(new DecoratorPattern())();
