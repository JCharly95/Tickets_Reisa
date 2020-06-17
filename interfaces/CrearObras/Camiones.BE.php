<?php 
    require('../../server/conexion.php');
    
    $con=conectar();

    $placa=$_POST['placa'];
    $capacidad=$_POST['capacidad'];
    $primerkm=$_POST['primerkm'];
    $subkm=$_POST['subkm'];
    $material=$variable;

    $sql="INSERT INTO camiones(Placa, Capacidad, Costo_Ini, Costo_KM, Material) VALUES ('$placa','$capacidad', '$primerkm','$subkm','$material')";
    
    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Camiones.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    $conn->close();



?>