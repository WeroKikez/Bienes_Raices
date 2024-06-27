<?php 

require 'funciones.php';
require 'config/database.php';
require __DIR__ . "/../vendor/autoload.php";

// Conectar a la base de datos
$db = conectar_db();

use Model\ActiveRecord;

ActiveRecord::setDB( $db );
