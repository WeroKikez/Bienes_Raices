<?php

function conectar_db() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db) {
        echo "Error! No se pudo conectar";
        exit;
    }

    return $db;
}