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



$ftpHost   = "216.70.82.104";
$ftpUsername = "TAM1539";
$ftpPassword = "qBg0iF1eQOpVfPRWXg8o";

?>