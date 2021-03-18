<?php

define('VENDOR_PATH', realpath('./vendor'));

// add vendor based autoloading
require_once VENDOR_PATH . '/autoload.php';
require_once __DIR__.'/init.php';


$command = RepCheck\Builder\Builder::getCheckCommand();
$command->run();
