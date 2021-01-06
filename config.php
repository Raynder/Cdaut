<?php
    spl_autoload_register(function ($class){
        $file = "class".DIRECTORY_SEPARATOR.$class.".php";

        require_once $file;
    });