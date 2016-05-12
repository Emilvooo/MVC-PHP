<?php
spl_autoload_register(function($class_name) {
    $base_path = '../'.str_replace('\\', '/', strtolower($class_name).'.php');
    if (file_exists($base_path)) {
        include_once($base_path);
    }
});
