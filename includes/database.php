<?php

function conectardb() : mysqli {
    
    //Orientada a objetos
    $db = mysqli_connect($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'], $_ENV['DB_BD']);
    $db->set_charset("utf8");
    if(!$db) {
        echo "Error, no se pudo conectar";
        exit;
    } 

    return $db;
}
