<?php
    require('../../server/conexion.php');
    
    $con=conectar();
    // asigna valor de las variables
    $sql="INSERT INTO obras(Folio_Ob,Nombre, Fec_Ini, Sta_Ob) VALUES ('NULL','', '','')";
    
    if($con->query($sql) == TRUE){
        header("Crear.Obra.php");
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    desconectar($con);
?>
