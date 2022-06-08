<?php include ("_head.php"); ?>
<?php include ("_menu.php"); ?>
<?php
require("../backend/ct_fun.php");
require("../backend/config.php");
require("../backend/var_clean.php");

$filexml = '../backend/proveedores/ct/productos.xml';
if (file_exists($filexml)) {
    $xml = simplexml_load_file($filexml);
    echo "<h2>Obteniendo datos de  productos.xml</h2>";

    $IdProveedor = 1; //CT
    //1) Buscar el producto de la base, sino se encuentra en el archivo xml ponerlo existencia en 0


    //2) Recorrer el archivo productos.xml, y buscar en la base de datos para actualizarlo y si no se encuentra agregarlo.
    $c = 0;
    echo "<table class='table'>";
    foreach ($xml->Producto as $Producto) 
    {   $c = $c + 1;
        echo "<tr>";
        echo "<td>".$Producto->clave."</td>";
        echo "<td>".$Producto->nombre." </td>";
        echo "<td>";
        //buscar en la bd;
        $sql = "select *  from productos WHERE clave='".$Producto->clave."' and idproveedor='".$IdProveedor."'";    
        // echo $sql;
        $rc = $db->query($sql);    
        if ($f = $rc->fetch_array()) {
            echo "Se encontro en la bd";            

            

        } else {
            echo "No se encontro (bd)";
        }
        unset($rc, $sql, $f);

        echo "</td>";


        echo "<td>";
            //buscar en la bd;
            $sql = "select *  from productos WHERE clave='".$Producto->clave."' and idproveedor='".$IdProveedor."'";    
            // echo $sql;
            $rc = $db->query($sql);    
            if ($f = $rc->fetch_array()) {
                $sql = "UPDATE productos SET    
                no_parte ='".LimpiarComillas($Producto->no_parte)."',
                nombre ='".LimpiarComillas($Producto->nombre)."',
                modelo ='".LimpiarComillas($Producto->modelo)."',
                idMarca ='".LimpiarComillas($Producto->idMarca)."',
                marca ='".LimpiarComillas($Producto->marca)."',
                idCategoria ='".LimpiarComillas($Producto->idCategoria)."',
                categoria ='".LimpiarComillas($Producto->categoria)."',
                idSubCategoria ='".LimpiarComillas($Producto->idSubCategoria)."',
                subcategoria ='".LimpiarComillas($Producto->subcategoria)."',
                imagen ='".LimpiarComillas($Producto->imagen)."',
                imagenFecha ='".LimpiarComillas($Producto->imagenFecha)."',
                descripcion_corta ='".LimpiarComillas($Producto->descripcion_corta)."',
                upc ='".LimpiarComillas($Producto->upc)."',
                ean ='".LimpiarComillas($Producto->ean)."',
                status ='".LimpiarComillas($Producto->status)."',
                sustituto ='".LimpiarComillas($Producto->sustituto)."',
                precio ='".LimpiarComillas($Producto->precio)."',
                moneda ='".LimpiarComillas($Producto->moneda)."',
                tipo_cambio ='".LimpiarComillas($Producto->tipo_cambio)."',
                act_fecha ='".$Fecha."',
                act_hora ='".$Hora."'";


                
                foreach ($Producto->especificacion as $especificacion)     
                {
                    if ($especificacion->caracteristica1->tipo <> ""){
                        $sql.=", tipo1='".$especificacion->caracteristica1->tipo."', valor1='".LimpiarComillas($especificacion->caracteristica1->valor)."'";                            
                    }

                    if ($especificacion->caracteristica2->tipo <> ""){
                        $sql.=", tipo2='".$especificacion->caracteristica2->tipo."', valor2='".LimpiarComillas($especificacion->caracteristica2->valor)."'";                            
                    }

                    if ($especificacion->caracteristica3->tipo <> ""){
                        $sql.=", tipo3='".$especificacion->caracteristica3->tipo."', valor3='".LimpiarComillas($especificacion->caracteristica3->valor)."'";                            
                    }

                    if ($especificacion->caracteristica4->tipo <> ""){
                        $sql.=", tipo4='".$especificacion->caracteristica4->tipo."', valor4='".LimpiarComillas($especificacion->caracteristica4->valor)."'";                            
                    }

                    if ($especificacion->caracteristica5->tipo <> ""){
                        $sql.=", tipo5='".$especificacion->caracteristica5->tipo."', valor5='".LimpiarComillas($especificacion->caracteristica5->valor)."'";                            
                    }

                    if ($especificacion->caracteristica6->tipo <> ""){
                        $sql.=", tipo6='".$especificacion->caracteristica6->tipo."', valor6='".LimpiarComillas($especificacion->caracteristica6->valor)."'";                            
                    }

                    if ($especificacion->caracteristica7->tipo <> ""){
                        $sql.=", tipo7='".$especificacion->caracteristica5->tipo."', valor7='".LimpiarComillas($especificacion->caracteristica7->valor)."'";                            
                    }

                    if ($especificacion->caracteristica8->tipo <> ""){
                        $sql.=", tipo8='".$especificacion->caracteristica8->tipo."', valor8='".LimpiarComillas($especificacion->caracteristica8->valor)."'";                            
                    }

                    if ($especificacion->caracteristica9->tipo <> ""){
                        $sql.=", tipo9='".$especificacion->caracteristica9->tipo."', valor9='".LimpiarComillas($especificacion->caracteristica9->valor)."'";                            
                    }

                    if ($especificacion->caracteristica10->tipo <> ""){
                        $sql.=", tipo10='".$especificacion->caracteristica10->tipo."', valor10='".LimpiarComillas($especificacion->caracteristica10->valor)."'";                            
                    }

                    if ($especificacion->caracteristica11->tipo <> ""){
                        $sql.=", tipo11='".$especificacion->caracteristica11->tipo."', valor11='".LimpiarComillas($especificacion->caracteristica11->valor)."'";                            
                    }

                    if ($especificacion->caracteristica12->tipo <> ""){
                        $sql.=", tipo12='".$especificacion->caracteristica12->tipo."', valor12='".LimpiarComillas($especificacion->caracteristica12->valor)."'";                            
                    }

                    if ($especificacion->caracteristica13->tipo <> ""){
                        $sql.=", tipo13='".$especificacion->caracteristica13->tipo."', valor13='".LimpiarComillas($especificacion->caracteristica13->valor)."'";                            
                    }

                    if ($especificacion->caracteristica14->tipo <> ""){
                        $sql.=", tipo14='".$especificacion->caracteristica14->tipo."', valor14='".LimpiarComillas($especificacion->caracteristica14->valor)."'";                            
                    }

                    if ($especificacion->caracteristica15->tipo <> ""){
                        $sql.=", tipo15='".$especificacion->caracteristica15->tipo."', valor15='".LimpiarComillas($especificacion->caracteristica15->valor)."'";                            
                    }
                    
                }
            $existencias = 0;
            foreach ($Producto->existencia as $existencia)     
                {
                    if ($existencia->HMO <> 0){                            
                        $sql.=", HMO='".intval($existencia->HMO)."'";         
                        $existencias = $existencias + $existencia->HMO;                   
                    }

                    if ($existencia->HMO <> 0){                            
                        $sql.=", OBR='".intval($existencia->OBR)."'";                     
                        $existencias = $existencias + $existencia->OBR;                          
                    }
                    
                    if ($existencia->LMO <> 0){                            
                        $sql.=", LMO='".intval($existencia->LMO)."'"; 
                        $existencias = $existencias + $existencia->LMO;
                    }
                    
                    if ($existencia->CLN <> 0){                            
                        $sql.=", CLN='".intval($existencia->CLN)."'"; 
                        $existencias = $existencias + $existencia->CLN;                           
                    }

                    if ($existencia->DGO <> 0){                            
                        $sql.=", DGO='".intval($existencia->DGO)."'"; 
                        $existencias = $existencias + $existencia->DGO;                           
                    }

                    if ($existencia->TRN <> 0){                            
                        $sql.=", TRN='".intval($existencia->TRN)."'";    
                        $existencias = $existencias + $existencia->TRN;                        
                    }

                    if ($existencia->CHI <> 0){                            
                        $sql.=", CHI='".intval($existencia->CHI)."'"; 
                        $existencias = $existencias + $existencia->CHI;                           
                    }

                    if ($existencia->AGS <> 0){                            
                        $sql.=", AGS='".intval($existencia->AGS)."'"; 
                        $existencias = $existencias + $existencia->AGS;                           
                    }

                    if ($existencia->QRO <> 0){                            
                        $sql.=", QRO='".intval($existencia->QRO)."'"; 
                        $existencias = $existencias + $existencia->QRO;                           
                    }

                    if ($existencia->SLP <> 0){                            
                        $sql.=", SLP='".intval($existencia->SLP)."'"; 
                        $existencias = $existencias + $existencia->SLP;                           
                    }

                    if ($existencia->LEO <> 0){                            
                        $sql.=", LEO='".intval($existencia->LEO)."'"; 
                        $existencias = $existencias + $existencia->LEO;                           
                    }


                    if ($existencia->GDL <> 0){                            
                        $sql.=", GDL='".intval($existencia->GDL)."'";     
                        $existencias = $existencias + $existencia->GDL;                       
                    }

                    if ($existencia->MOR <> 0){                            
                        $sql.=", MOR='".intval($existencia->MOR)."'"; 
                        $existencias = $existencias + $existencia->MOR;                           
                    }

                    if ($existencia->SLT <> 0){                            
                        $sql.=", SLT='".intval($existencia->SLT)."'"; 
                        $existencias = $existencias + $existencia->SLT;                           
                    }

                    
                    if ($existencia->XLP <> 0){                            
                        $sql.=", XLP='".intval($existencia->XLP)."'"; 
                        $existencias = $existencias + $existencia->XLP;                           
                    }

                    
                    if ($existencia->VER <> 0){                            
                        $sql.=", VER='".intval($existencia->VER)."'"; 
                        $existencias = $existencias + $existencia->VER;                           
                    }


                    if ($existencia->COL <> 0){                            
                        $sql.=", COL='".intval($existencia->COL)."'"; 
                        $existencias = $existencias + $existencia->COL;                           
                    }


                    if ($existencia->CTZ <> 0){                            
                        $sql.=", CTZ='".intval($existencia->CTZ)."'"; 
                        $existencias = $existencias + $existencia->CTZ;                           
                    }

                    if ($existencia->TAM <> 0){                            
                        $sql.=", TAM='".intval($existencia->TAM)."'"; 
                        $existencias = $existencias + $existencia->TAM;                           
                    }

                    if ($existencia->PUE <> 0){                            
                        $sql.=", PUE='".intval($existencia->PUE)."'"; 
                        $existencias = $existencias + $existencia->PUE;                           
                    }

                    if ($existencia->VHA <> 0){                            
                        $sql.=", VHA='".intval($existencia->VHA)."'"; 
                        $existencias = $existencias + $existencia->VHA;                           
                    }

                    
                    if ($existencia->TXA <> 0){                            
                        $sql.=", TXA='".intval($existencia->TXA)."'"; 
                        $existencias = $existencias + $existencia->TXA;                           
                    }


                    if ($existencia->MTY <> 0){                            
                        $sql.=", MTY='".intval($existencia->MTY)."'"; 
                        $existencias = $existencias + $existencia->MTY;                           
                    }


                    if ($existencia->TPC <> 0){                            
                        $sql.=", TPC='".intval($existencia->TPC)."'"; 
                        $existencias = $existencias + $existencia->TPC;                           
                    }


                    if ($existencia->MID <> 0){                            
                        $sql.=", MID='".intval($existencia->MID)."'";     
                        $existencias = $existencias + $existencia->MID;                       
                    }

                    if ($existencia->OAX <> 0){                            
                        $sql.=", OAX='".intval($existencia->OAX)."'"; 
                        $existencias = $existencias + $existencia->OAX;                           
                    }


                    if ($existencia->MAZ <> 0){                            
                        $sql.=", MAZ='".intval($existencia->MAZ)."'"; 
                        $existencias = $existencias + $existencia->MAZ;                           
                    }

                    if ($existencia->CUE <> 0){                            
                        $sql.=", CUE='".intval($existencia->CUE)."'"; 
                        $existencias = $existencias + $existencia->CUE;                           
                    }

                    if ($existencia->TOL <> 0){                            
                        $sql.=", TOL='".intval($existencia->TOL)."'"; 
                        $existencias = $existencias + $existencia->TOL;                           
                    }


                    if ($existencia->PAC <> 0){                            
                        $sql.=", PAC='".intval($existencia->PAC)."'"; 
                        $existencias = $existencias + $existencia->PAC;                           
                    }


                    if ($existencia->CUN <> 0){                            
                        $sql.=", CUN='".intval($existencia->CUN)."'"; 
                        $existencias = $existencias + $existencia->CUN;                           
                    }


                    if ($existencia->DFP <> 0){                            
                        $sql.=", DFP='".intval($existencia->DFP)."'";   
                        $existencias = $existencias + $existencia->DFP;                         
                    }

                    if ($existencia->DFA <> 0){                            
                        $sql.=", DFA='".intval($existencia->DFA)."'"; 
                        $existencias = $existencias + $existencia->DFA;                           
                    }

                    
                    if ($existencia->ZAC <> 0){                            
                        $sql.=", ZAC='".intval($existencia->ZAC)."'"; 
                        $existencias = $existencias + $existencia->ZAC;                           
                    }

                    
                    if ($existencia->DFT <> 0){                            
                        $sql.=", DFT='".intval($existencia->DFT)."'"; 
                        $existencias = $existencias + $existencia->DFT;                           
                    }

                    
                    if ($existencia->ACA <> 0){                            
                        $sql.=", ACA='".intval($existencia->ACA)."'"; 
                        $existencias = $existencias + $existencia->ACA;                           
                    }

                    
                    if ($existencia->IRA <> 0){                            
                        $sql.=", IRA='".intval($existencia->IRA)."'";    
                        $existencias = $existencias + $existencia->IRA;                        
                    }
                    

                    if ($existencia->DFC <> 0){                            
                        $sql.=", DFC='".intval($existencia->DFC)."'"; 
                        $existencias = $existencias + $existencia->DFC;                           
                    }

                    if ($existencia->TXL <> 0){                            
                        $sql.=", TXL='".intval($existencia->TXL)."'"; 
                        $existencias = $existencias + $existencia->TXL;                           
                    }

                    if ($existencia->ACX <> 0){                            
                        $sql.=", ACX='".intval($existencia->ACX)."'"; 
                        $existencias = $existencias + $existencia->ACX;                           
                    }

                    if ($existencia->URP <> 0){                            
                        $sql.=", URP='".intval($existencia->URP)."'";  
                        $existencias = $existencias + $existencia->URP;                          
                    }

                    if ($existencia->CDV <> 0){                            
                        $sql.=", CDV='".intval($existencia->CDV)."'";   
                        $existencias = $existencias + $existencia->CDV;                         
                    }

                    if ($existencia->CEL <> 0){                            
                        $sql.=", CEL='".intval($existencia->CEL)."'"; 
                        $existencias = $existencias + $existencia->CEL;                           
                    }

                    if ($existencia->CAM <> 0){                            
                        $sql.=", CAM='".intval($existencia->CAM)."'"; 
                        $existencias = $existencias + $existencia->CAM;                           
                    }

                    if ($existencia->D2A <> 0){                            
                        $sql.=", D2A='".intval($existencia->D2A)."'"; 
                        $existencias = $existencias + $existencia->D2A;                           
                    }
            }
            
            $sql.= " WHERE clave='".$Producto->clave."' and idproveedor='".$IdProveedor."'";
            // echo $sql;
            if ($db->query($sql) == TRUE)
            {   
                echo "Se actualizo";
            } else {
                echo "Error: ".$sql."; ";
            }

            

        } else {
                    $sql = "INSERT INTO productos
                    (idproveedor,clave, no_parte,  nombre, modelo, marca, idCategoria, categoria, idSubCategoria,  subcategoria, imagen, imagenFecha,
                    descripcion_corta, upc, ean, status, sustituto, precio, moneda, tipo_cambio, act_fecha, act_hora,
                    tipo1, valor1, tipo2, valor2, tipo3, valor3, tipo4, valor4, tipo5, valor5, tipo6, valor6, tipo7, valor7, tipo8, valor8,
                    tipo9, valor9, tipo10, valor10, tipo11, valor11, tipo12, valor12, tipo13, valor13, tipo14, valor14, tipo15, valor15,
                    HMO,OBR,LMO,CLN,DGO,TRN,CHI,AGS,QRO,SLP,LEO,GDL, MOR,SLT,XLP,VER, COL, CTZ,TAM, PUE, VHA, TXA, MTY,TPC, MID,
                        OAX, MAZ, CUE, TOL, PAC, CUN, DFP, DFA, ZAC, DFT, ACA, IRA, DFC, TXL, ACX, URP, CDV, CEL, CAM, D2A, existencias
                    )
                    VALUES
                    (   '1',
                        '".LimpiarComillas($Producto->clave)."',
                        '".LimpiarComillas($Producto->no_parte)."',
                        '".LimpiarComillas($Producto->nombre)."',
                        '".LimpiarComillas($Producto->modelo)."',
                        '".LimpiarComillas($Producto->marca)."',               
                        '".LimpiarComillas($Producto->idCategoria)."',
                        '".LimpiarComillas($Producto->categoria)."',
                        '".LimpiarComillas($Producto->idSubCategoria)."',
                        '".LimpiarComillas($Producto->subcategoria)."',
                        '".LimpiarComillas($Producto->imagen)."',
                        '".LimpiarComillas($Producto->imagenFecha)."',         
                        '".LimpiarComillas($Producto->descripcion_corta)."',
                        '".LimpiarComillas($Producto->upc)."',
                        '".LimpiarComillas($Producto->ean)."',
                        '".LimpiarComillas($Producto->status)."',
                        '".LimpiarComillas($Producto->sustituto)."',
                        '".LimpiarComillas($Producto->precio)."',
                        '".LimpiarComillas($Producto->moneda)."',
                        '".LimpiarComillas($Producto->tipo_cambio)."',
                        '".$Fecha."',
                        '".$Hora."'";            
                        $txt_esp = 0;
                        foreach ($Producto->especificacion as $especificacion)     
                        { $txt_esp = $txt_esp +1;
                            if ($especificacion->caracteristica1->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica1->tipo."', '".LimpiarComillas($especificacion->caracteristica1->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica2->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica2->tipo."', '".LimpiarComillas($especificacion->caracteristica2->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica3->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica3->tipo."', '".LimpiarComillas($especificacion->caracteristica3->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica4->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica4->tipo."', '".LimpiarComillas($especificacion->caracteristica4->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica5->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica5->tipo."', '".LimpiarComillas($especificacion->caracteristica5->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica6->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica6->tipo."', '".LimpiarComillas($especificacion->caracteristica6->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica7->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica5->tipo."', '".LimpiarComillas($especificacion->caracteristica7->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica8->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica8->tipo."', '".LimpiarComillas($especificacion->caracteristica8->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica9->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica9->tipo."', '".LimpiarComillas($especificacion->caracteristica9->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica10->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica10->tipo."', '".LimpiarComillas($especificacion->caracteristica10->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica11->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica11->tipo."', '".LimpiarComillas($especificacion->caracteristica11->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica12->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica12->tipo."', '".LimpiarComillas($especificacion->caracteristica12->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica13->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica13->tipo."', '".LimpiarComillas($especificacion->caracteristica13->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica14->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica14->tipo."', '".LimpiarComillas($especificacion->caracteristica14->valor)."'";                            
                            } else {$sql.=", '', ''";}

                            if ($especificacion->caracteristica15->tipo <> ""){
                                $sql.=", '".$especificacion->caracteristica15->tipo."', '".LimpiarComillas($especificacion->caracteristica15->valor)."'";                            
                            } else {$sql.=", '', ''";}
                            
                        }
                        if ($txt_esp == 0){
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";
                            $sql.=", '', ''";                    
                        }
                    
                    $existencias = 0;
                    foreach ($Producto->existencia as $existencia)     
                        {
                            if ($existencia->HMO <> 0){                            
                                $sql.=",'".intval($existencia->HMO)."'";        
                                $existencias = $existencias + $existencia->HMO;                    
                            } else {$sql.=",  '0'";}

                            if ($existencia->OBR <> 0){                            
                                $sql.=", '".intval($existencia->OBR)."'";                          
                                $existencias = $existencias + $existencia->OBR;                      
                            } else {$sql.=", '0'";}
                            
                            if ($existencia->LMO <> 0){                            
                                $sql.=", '".intval($existencia->LMO)."'";     
                                $existencias = $existencias + $existencia->LMO;                                           
                            } else {$sql.=", '0'";}
                            
                            if ($existencia->CLN <> 0){                            
                                $sql.=", '".intval($existencia->CLN)."'";     
                                $existencias = $existencias + $existencia->CLN;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->DGO <> 0){                            
                                $sql.=", '".intval($existencia->DGO)."'";     
                                $existencias = $existencias + $existencia->DGO;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->TRN <> 0){                            
                                $sql.=", '".intval($existencia->TRN)."'";    
                                $existencias = $existencias + $existencia->TRN;                                            
                            } else {$sql.=", '0'";}

                            if ($existencia->CHI <> 0){                            
                                $sql.=", '".intval($existencia->CHI)."'";     
                                $existencias = $existencias + $existencia->CHI;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->AGS <> 0){                            
                                $sql.=", '".intval($existencia->AGS)."'";     
                                $existencias = $existencias + $existencia->AGS;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->QRO <> 0){                            
                                $sql.=", '".intval($existencia->QRO)."'";     
                                $existencias = $existencias + $existencia->QRO;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->SLP <> 0){                            
                                $sql.=", '".intval($existencia->SLP)."'";     
                                $existencias = $existencias + $existencia->SLP;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->LEO <> 0){                            
                                $sql.=", '".intval($existencia->LEO)."'";    
                                $existencias = $existencias + $existencia->LEO;                                            
                            } else {$sql.=", '0'";}


                            if ($existencia->GDL <> 0){                            
                                $sql.=", '".intval($existencia->GDL)."'";     
                                $existencias = $existencias + $existencia->GDL;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->MOR <> 0){                            
                                $sql.=", '".intval($existencia->MOR)."'";     
                                $existencias = $existencias + $existencia->MOR;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->SLT <> 0){                            
                                $sql.=", '".intval($existencia->SLT)."'";     
                                $existencias = $existencias + $existencia->SLT;                                           
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->XLP <> 0){                            
                                $sql.=", '".intval($existencia->XLP)."'";   
                                $existencias = $existencias + $existencia->XLP;                                             
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->VER <> 0){                            
                                $sql.=", '".intval($existencia->VER)."'";     
                                $existencias = $existencias + $existencia->VER;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->COL <> 0){                            
                                $sql.=", '".intval($existencia->COL)."'";     
                                $existencias = $existencias + $existencia->COL;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->CTZ <> 0){                            
                                $sql.=", '".intval($existencia->CTZ)."'";     
                                $existencias = $existencias + $existencia->CTZ;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->TAM <> 0){                            
                                $sql.=", '".intval($existencia->TAM)."'";      
                                $existencias = $existencias + $existencia->TAM;                                          
                            } else {$sql.=", '0'";}

                            if ($existencia->PUE <> 0){                            
                                $sql.=", '".intval($existencia->PUE)."'";     
                                $existencias = $existencias + $existencia->PUE;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->VHA <> 0){                            
                                $sql.=", '".intval($existencia->VHA)."'";     
                                $existencias = $existencias + $existencia->VHA;                                           
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->TXA <> 0){                            
                                $sql.=", '".intval($existencia->TXA)."'";     
                                $existencias = $existencias + $existencia->TXA;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->MTY <> 0){                            
                                $sql.=", '".intval($existencia->MTY)."'";     
                                $existencias = $existencias + $existencia->MTY;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->TPC <> 0){                            
                                $sql.=", '".intval($existencia->TPC)."'";      
                                $existencias = $existencias + $existencia->TPC;                                          
                            } else {$sql.=", '0'";}


                            if ($existencia->MID <> 0){                            
                                $sql.=", '".intval($existencia->MID)."'";     
                                $existencias = $existencias + $existencia->MID;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->OAX <> 0){                            
                                $sql.=", '".intval($existencia->OAX)."'";     
                                $existencias = $existencias + $existencia->OAX;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->MAZ <> 0){                            
                                $sql.=", '".intval($existencia->MAZ)."'";     
                                $existencias = $existencias + $existencia->MAZ;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->CUE <> 0){                            
                                $sql.=", '".intval($existencia->CUE)."'";     
                                $existencias = $existencias + $existencia->CUE;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->TOL <> 0){                            
                                $sql.=", '".intval($existencia->TOL)."'";     
                                $existencias = $existencias + $existencia->TOL;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->PAC <> 0){                            
                                $sql.=", '".intval($existencia->PAC)."'";     
                                $existencias = $existencias + $existencia->PAC;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->CUN <> 0){                            
                                $sql.=", '".intval($existencia->CUN)."'";     
                                $existencias = $existencias + $existencia->CUN;                                           
                            } else {$sql.=", '0'";}


                            if ($existencia->DFP <> 0){                            
                                $sql.=", '".intval($existencia->DFP)."'";   
                                $existencias = $existencias + $existencia->DFP;                                             
                            } else {$sql.=", '0'";}

                            if ($existencia->DFA <> 0){                            
                                $sql.=", '".intval($existencia->DFA)."'";     
                                $existencias = $existencias + $existencia->DFA;                                           
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->ZAC <> 0){                            
                                $sql.=", '".intval($existencia->ZAC)."'";     
                                $existencias = $existencias + $existencia->ZAC;                                           
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->DFT <> 0){                            
                                $sql.=", '".intval($existencia->DFT)."'";     
                                $existencias = $existencias + $existencia->DFT;                                           
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->ACA <> 0){                            
                                $sql.=", '".intval($existencia->ACA)."'";     
                                $existencias = $existencias + $existencia->ACA;                                           
                            } else {$sql.=", '0'";}

                            
                            if ($existencia->IRA <> 0){                            
                                $sql.=", '".intval($existencia->IRA)."'";      
                                $existencias = $existencias + $existencia->IRA;                                          
                            } else {$sql.=", '0'";}
                            

                            if ($existencia->DFC <> 0){                            
                                $sql.=", '".intval($existencia->DFC)."'";     
                                $existencias = $existencias + $existencia->DFC;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->TXL <> 0){                            
                                $sql.=", '".intval($existencia->TXL)."'"; 
                                $existencias = $existencias + $existencia->TXL;                                               
                            } else {$sql.=", '0'";}

                            if ($existencia->ACX <> 0){                            
                                $sql.=", '".intval($existencia->ACX)."'";     
                                $existencias = $existencias + $existencia->ACX;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->URP <> 0){                            
                                $sql.=", '".intval($existencia->URP)."'";     
                                $existencias = $existencias + $existencia->URP;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->CDV <> 0){                            
                                $sql.=", '".intval($existencia->CDV)."'";     
                                $existencias = $existencias + $existencia->CDV;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->CEL <> 0){                            
                                $sql.=", '".intval($existencia->CEL)."'";    
                                $existencias = $existencias + $existencia->CEL;                                            
                            } else {$sql.=", '0'";}

                            if ($existencia->CAM <> 0){                            
                                $sql.=", '".intval($existencia->CAM)."'";     
                                $existencias = $existencias + $existencia->CAM;                                           
                            } else {$sql.=", '0'";}

                            if ($existencia->D2A <> 0){                            
                                $sql.=", '".intval($existencia->D2A)."'";     
                                $existencias = $existencias + $existencia->D2A;                                           
                            } else {$sql.=", '0'";}
                    }
                    $sql.=",'".$existencias."')";
                    
                    // $sql.= " WHERE clave='".$Producto->clave."' and IdProveedor='".$IdProveedor."'";
                    // echo $sql;
                    if ($db->query($sql) == TRUE)
                    { 
                        echo "Nuevo producto";
                        // $txt_act.= "<tr style='background-color:green;'><td >".$Producto->clave." - ".$Producto->nombre.", ".$Producto->descripcion_corta."</td><td>".$Producto->precio."</td></tr>";                                
                        // Historia($IdUser,"IMPORT","[XML] Actualizo  producto ".$Producto->clave." : ".addslashes($sql));
                    } else {
                        echo "Error: ".$sql."; ";
                    }
                       




        }
        unset($rc, $sql, $f);

        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

} else {
    Toast("No se encontro el archivo productos.xml (CT)","Error");
}


?>

<script>
function CTDownload(){
    $('#PreLoader').show();
    $.ajax({
      url: "../backend/ct_downloadxml.php",
      type: "post",   
      data: {},
      success: function(data){
       $('#R').html(data+"\n");
       $('#PreLoader').hide();
      }
   });
}

</script>

<?php include ("_footer.php"); ?>