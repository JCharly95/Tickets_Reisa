<?php

    require('../../server/conexion.php');
    
    $con=conectar();

    // asigna valor de las variables
    $material=$_POST['material'];
    
    $sql="INSERT INTO camiones(Placa, Capacidad, Costo_Ini, Costo_KM, Material) VALUES ('','', '','', '$material')";
    
    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Camiones.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    desconectar($con);
?>







 
