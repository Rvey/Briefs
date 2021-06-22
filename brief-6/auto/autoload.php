<?php

spl_autoload_register(function ($class_name) {
    include '../Modules/' . $class_name . '.php';
});


