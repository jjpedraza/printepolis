<?php
include("../admin/seguridad.php");
require("ct_fun.php");
require("funciones.php");
require("config.php");

if (DescargarXML()==TRUE){
    Toast("Archivo XML del Proveedor CT descargado correctamente","Succcess");
} else {
    Toast("Error al obtener el xml del proveedor de CT","Error");
}

?>