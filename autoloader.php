<?php
declare(strict_types=1);
spl_autoload_register('autoLoader');

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);

function autoLoader(string $className)
{
    $baseDir = DIR_APP . DS;
    $class = $baseDir . str_replace('\\', DS, $className) . '.php';

    if (file_exists($class) && !is_dir($class)) {
        include $class;
    }
}
