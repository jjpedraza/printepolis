<?php 
function ValidaAdmin($IdAdmin, $Password){
    require("config.php");
    $sql = "select count(*) as n from admin where idadmin='".$IdAdmin."' and password='".$Password."'";
    echo $sql;
    $r= $db -> query($sql); if($f = $r -> fetch_array()){
            if ($f['n']==0){
                return FALSE;
            } else {
                return TRUE;
            }
    }else{
            return FALSE;
    }
    unset($r, $f);
        
}

function Log_ProblemasIn($Problema, $Descripcion, $IdUsuario = ""){
    require("config.php");
    $sql = "
        INSERT INTO log_problemas
            (problema, descripcion, idusuario, fecha, hora)
        VALUES 
            ('".$Problema."', '".$Descripcion."', '".$IdUsuario."', '".$Fecha."', '".$Hora."')
        
        ";
        if ($db->query($sql) == TRUE){                   	        
            return TRUE;
        } else {
            return FALSE;
        }
    
    
    unset($sql);
}
    

function Toast($Texto,$Tipo="",$img=""){    
    // Problema_create("PLATAFORMA", "TOAST: ".$Texto, $IdEmpleado);

    if ($Tipo==""){
        echo "<script>";
            echo "$.toast('".$Texto."');";
        echo "</script>";
    }

    $Tipo = strtoupper($Tipo);
    if ($Tipo=="ERROR"){
        echo "<script>";
        echo "
        $.toast({
            heading: 'Error',
            text: '".$Texto."',
            showHideTransition: 'slide',
            icon: 'error'
        })
        $('#AudioError')[0].play();
        ";

        echo "</script>";
        
    }



    if ($Tipo=="INFORMATION"){
        echo "<script>";
        echo "
        $.toast({
            heading: 'Information',
            text: '".$Texto."',
            showHideTransition: 'slide',
            icon: 'info'
        })
        $('#AudioBoop2')[0].play();
        ";

        echo "</script>";
        
    }


    if ($Tipo=="WARNING"){
        echo "<script>";
        echo "
        $.toast({
            heading: 'warning',
            text: '".$Texto."',
            showHideTransition: 'slide',
            icon: 'warning'
        })
        $('#AudioError')[0].play();
        ";

        echo "</script>";
        
    }


    if ($Tipo=="SUCCESS"){
        echo "<script>";
        echo "
        $.toast({
            heading: 'success',
            text: '".$Texto."',
            showHideTransition: 'slide',
            icon: 'success'
        })
        $('#AudioSuccess')[0].play();
        ";

        echo "</script>";
        
    }

}


?>