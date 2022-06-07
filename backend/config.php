<?php
$Fecha = date('Y-m-d');
$Hora =  date ("H:i:s");

$dbhost = 'localhost';	
$dbuser = 'root';
$dbpass = ''; 
$dbname = 'printepolis';

if (function_exists('mysqli_connect')) {
    $db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    // $acentos = $db->query("SET NAMES 'utf8'"); 
}else{
    echo "Error al conectarse a la db";

}



?>