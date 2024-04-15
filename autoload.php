<?php

spl_autoload_register(function (string $class) {
    $classFilePatch = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $classFilePatch . '.php';
});