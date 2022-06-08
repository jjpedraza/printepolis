<?php
define("FTP_SERVER", "216.70.82.104"); //IP o Nombre del Servidor
define("FTP_PORT", 21); //Puerto desde fuera 2323
define("FTP_USER", "TAM1539"); //Nombre de Usuario
define("FTP_PASSWORD", "qBg0iF1eQOpVfPRWXg8o*"); //Contraseña de acceso
define("FTP_DIR", "/catalogo_xml/"); //ruta del  ftp

// define("FTP_SERVER", "216.70.82.104"); //IP o Nombre del Servidor
// define("FTP_PORT", 21); //Puerto desde fuera 2323
// define("FTP_USER", "TAM1539@216.70.82.104"); //Nombre de Usuario
// define("FTP_PASSWORD", "qBg0iF1eQOpVfPRWXg8o*"); //Contraseña de acceso
// define("FTP_DIR", "/catalogo_xml/"); //ruta del  ftp





function FTP_existe_archivo($archivo){
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP
	$fileSize = ftp_size($id_ftp, FTP_ruta().$archivo);
	if ($fileSize != -1) {return "TRUE";} else {return "FALSE";}
}

function FTP_descargar($archivo){
	$lista="";
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP
	ftp_pasv($id_ftp, true);
	//echo $archivo;
	
	// intenta descargar $server_file y guardarlo en $local_file
	if (ftp_get($id_ftp, "tmp/".$archivo, "".$archivo, FTP_BINARY)) {
    		//return "Se ha guardado satisfactoriamente en $archivo\n";
			return "TRUE";
	} else {
		    return "FALSE";
	}

	 
}

function FTP_descargar_doc($archivo){
	$lista="";
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP
	ftp_pasv($id_ftp, true);
	//echo $archivo;

	// intenta descargar $server_file y guardarlo en $local_file
	if (ftp_get($id_ftp, "tmp/".$archivo, "".$archivo, FTP_BINARY)) {
    		//return "Se ha guardado satisfactoriamente en $archivo\n";
			return "TRUE";
	} else {
		    return "FALSE";
	}

	 
}

function get_ftp_mode($file)
{    
    $path_parts = pathinfo($file);
    
    if (!isset($path_parts['extension'])) return FTP_BINARY;
    switch (strtolower($path_parts['extension'])) {
        case 'am':case 'asp':case 'bat':case 'c':case 'cfm':case 'cgi':case 'conf':
        case 'cpp':case 'css':case 'dhtml':case 'diz':case 'h':case 'hpp':case 'htm':
        case 'html':case 'in':case 'inc':case 'js':case 'm4':case 'mak':case 'nfs':
        case 'nsi':case 'pas':case 'patch':case 'php':case 'php3':case 'php4':case 'php5':
        case 'phtml':case 'pl':case 'po':case 'py':case 'qmail':case 'sh':case 'shtml':
        case 'sql':case 'tcl':case 'tpl':case 'txt':case 'vbs':case 'xml':case 'xrc':
            return FTP_ASCII;
    }
    return FTP_BINARY;
}

function FTP_lista(){
	$lista="";
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP
	$files = ftp_nlist($id_ftp, '.');
	foreach ($files as $file) {

	$lista = $lista.FTP_ruta().$file . "<br>";
	}
	return $lista;
}
function FTP_leer($archivo_nombre){
$ftp_url="ftp://".FTP_USER.":".FTP_PASSWORD."@".FTP_SERVER.FTP_DIR.$archivo_nombre;
//ftp://desarrollo2:jpedraza@ftp.172.16.90.3/home/desarrollo2/public_html/tam.png

echo $ftp_url;
$archivo = fopen ($ftp_url, "r");
if (!$archivo) {
		return "ERROR";
		
}else {return $archivo;}

}

function FTP_conectar(){
//Permite conectarse al Servidor FTP
	
	$id_ftp=ftp_connect(FTP_SERVER,FTP_PORT); //Obtiene un manejador del Servidor FTP
	//$id_ftp=ftp_ssl_connect(FTP_SERVER,FTP_PORT); //Obtiene un manejador del Servidor FTP
	ftp_login($id_ftp,FTP_USER,FTP_PASSWORD); //Se loguea al Servidor FTP
	ftp_pasv($id_ftp, FALSE); //Establece el modo de conexión

    var_dump($id_ftp);
return $id_ftp; //Devuelve el manejador a la función
}


function FTP_subir_post($archivo_local,$archivo_remoto){
//if (isset($_FILES[$archivo_local])){	
	//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP

	if (ftp_put($id_ftp,FTP_ruta().$archivo_remoto,$_FILES[$archivo_local]['tmp_name'],FTP_BINARY)){
		return "TRUE";} else {return "FALSE";}
	//Sube un archivo al Servidor FTP en modo Binario
	ftp_quit($id_ftp); //Cierra la conexion FTP
//} else {return "FALSE";}
}

function FTP_subir($archivo_local,$archivo_remoto){
	//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP
	//echo "REMOTO:".$id_ftp,FTP_ruta().$archivo_remoto."\n";
	//echo  "LOCAL:".$archivo_local;
	if (ftp_put($id_ftp,FTP_ruta().$archivo_remoto,$archivo_local,FTP_BINARY)){
		return "TRUE";} else {return "FALSE";}
	//Sube un archivo al Servidor FTP en modo Binario
	ftp_quit($id_ftp); //Cierra la conexion FTP
}

function FTP_ruta(){
	//Obriene ruta del directorio del Servidor FTP (Comando PWD)
	$id_ftp=FTP_conectar(); //Obtiene un manejador y se conecta al Servidor FTP
	$Directorio=ftp_pwd($id_ftp); //Devuelve ruta actual p.e. "/home/willy"
	ftp_quit($id_ftp); //Cierra la conexion FTP
return $Directorio."/"; //Devuelve la ruta a la función
}





function DescargarXML(){
    require("config.php");
    
    $connId = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");
    if(@ftp_login($connId, $ftpUsername, $ftpPassword)){
        echo "conectado a $ftpUsername@$ftpHost";
        Toast("conectado a $ftpUsername@$ftpHost",0,"");
    }else{
        echo "No se pudo conectar a $ftpUsername";
    }




    $localFilePath  = '../backend/proveedores/ct/productos.xml';
    $remoteFilePath = 'catalogo_xml/productos.xml';

    // activar modo pasivo
    ftp_pasv($connId, true);
	
    // try to download a file from server
    if(ftp_get($connId, $localFilePath, $remoteFilePath, FTP_BINARY)){
        // echo "File transfer successful - $localFilePath";
        return TRUE;
    }else{
        // echo "There was an error while downloading $localFilePath";
        return FALSE;
    }

	echo "Error:".error_get_last();
	
    // close the connection
    ftp_close($connId);
}



function DescargarJSON(){
    require("config.php");
    
    $connId = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");
    if(@ftp_login($connId, $ftpUsername, $ftpPassword)){
        echo "conectado a $ftpUsername@$ftpHost";
    }else{
        echo "No se pudo conectar a $ftpUsername";
    }




    $localFilePath  = 'tmp//productos.json';
    $remoteFilePath = 'catalogo_xml/productos.json';
    ftp_pasv($connId, true);

    // try to download a file from server
    if(ftp_get($connId, $localFilePath, $remoteFilePath, FTP_BINARY)){
        // echo "File transfer successful - $localFilePath";
        return TRUE;
    }else{
        // echo "There was an error while downloading $localFilePath";
        return FALSE;
    }

    // close the connection
    ftp_close($connId);
}

function jsonToCSV($jfilename, $cfilename)
{
    if (($json = file_get_contents($jfilename)) == false)
        die('Error reading json file...');
    $data = json_decode($json, true);
    
    $fp = fopen($cfilename, 'w');    
    $header = false;
    foreach ($data as $row)
    {
        if (empty($header))
        {
            $header = array_keys($row);
            fputcsv($fp, $header);
            $header = array_flip($header);
        }
        // echo "row = ".$row." -> ".$header."<br>";
        fputcsv($fp, array_merge($header, $row));
    }
    fclose($fp);
    
    return;
}




function isCategoria($IdCategoria){
    require("config.php");        
    $sql = "select * from cat_categorias WHERE IdCategoria='".$IdCategoria."'";        
    $rc = $conexion->query($sql);    
    if ($f = $rc->fetch_array()) {
        return TRUE;
    } else {
        return FALSE;
    }
    unset($rc, $sql, $f);  
}



function inCategoria($txtCategoria, $IdCategoria, $sub = ""){
    require("config.php");            
    $sql = "INSERT INTO cat_categorias
    (IdCategoria, Categoria, sub)
    VALUES
    ('".$IdCategoria."', '".$txtCategoria."', '".$sub."')";
    if ($conexion->query($sql) == TRUE)
    {	//echo "ok";
        return TRUE;
    }
        else
    {	////echo $sql;
        return FALSE;
    }
    unset($sql);  
}


function CountFileXML(){
    $filexml = 'tmp/productos.xml';
        if (file_exists($filexml)) {
            $xml = simplexml_load_file("tmp/productos.xml");    
            $c = 0;            
            foreach ($xml->Producto as $Producto) 
            {   $c = $c + 1;
            }
            return $c;
        } else {
            return 0;
        }
}

function CountFileJSON(){
    $filexml = 'tmp/productos.json';
    if (file_exists($filexml)) {
        $data = file_get_contents($filexml);    
        $productos = json_decode($data, true);
        $c_json = 0;    
        foreach ($productos as $Producto) {
            $c_json = $c_json + 1;
        }
        return $c_json;
    } else {
        return 0;
    }
}


?>