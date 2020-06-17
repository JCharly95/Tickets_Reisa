<?php

    require('../../server/conexion.php');
    
    $con=conectar();

    // asigna valor de las variables
    
    
    $sql="INSERT INTO obras(Folio_Ob,Nombre, Fec_Ini, Sta_Ob) VALUES ('NULL','', '','')";
    
    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Crear.Obra.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    $con->close();

?>
