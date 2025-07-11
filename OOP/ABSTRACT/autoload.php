<?php
spl_autoload_register(function($classname){
    $path = __DIR__ . "/CLASSES/" . str_replace('\\', '/', $classname) . ".php";
    if(file_exists($path)){
        require_once $path;
    } else {
        die("Files did not exist $path");
    }
});
?>
