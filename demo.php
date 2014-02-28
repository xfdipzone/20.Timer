<?php

require 'Timer.class.php';

$timer = new Timer();
$timer->start();

$timer->start('program1');
usleep(mt_rand(100000,500000));
$timer->end('program1');
$timer->printTime('program1');

$timer->start('program2');
usleep(mt_rand(100000,500000));
$timer->end('program2');
$timer->printTime('program2');

$timer->end();
$timer->printTime();

?>