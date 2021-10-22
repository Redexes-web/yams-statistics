<?php
use App\Classes\YamsStatistics;

require __DIR__ . '/vendor/autoload.php';

// TODO: add better constraints system for $_POST 
$results =  isset($_POST) && 
            isset($_POST["tries"]) &&
            $_POST["tries"] < 4096 
            ? 
            (new YamsStatistics($_POST["tries"]))->getResults() 
            : 
            (new YamsStatistics(100))->getResults() ;

include "app/views/index.phtml";