<?php
require("config.php");
require("var_clean.php");
require("funciones.php");

if (isset($_POST['IdAdmin']) & isset($_POST['Password'])){
    $IdAdmin = VarClean($_POST['IdAdmin']);
    $Password = VarClean($_POST['Password']);
    if (ValidaAdmin($IdAdmin, $Password) == TRUE){
        session_start();
        $_SESSION['IdAdmin'] = $IdAdmin; //session		                     
        $IdAdmin = $_SESSION['IdAdmin'];
        echo '<script type="text/javascript">top.location.href="index.php"</script>';

        Toast("Acceso correcto","Success");
        
    } else {
        // echo "Usuario incorrecto";
        Toast("Usuario o Password incorrectos, vuelva a intentarlo","ERROR");
        Log_ProblemasIn("LOGIN", "Usuario incorrecto o Password Incorrecto (".$IdAdmin." - ".$Password.")", "");
    }
    
    
    
} else {
    echo "Parametros invalidos";
}

?>