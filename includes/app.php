<?php 

require __DIR__ . '/../vendor/autoload.php';
require 'funciones.php';
require 'config/database.php';

$db = conectarDB();


use Model\ActiveRecord;
ActiveRecord::setDb($db);