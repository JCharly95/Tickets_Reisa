<?php 
    require('../../server/conexion.php');
    
    $con=conectar();

    $placa=$_POST['placa'];
    $capacidad=$_POST['capacidad'];
    $primerkm=$_POST['primerKm'];
    $subkm=$_POST['subKM'];

    $sql="INSERT INTO user_camion(ID_User_Cam, UserID , CamionID) VALUES ('NULL','', ' $placa')";
    $sql="UPDATE camiones SET Placa='$placa', Capacidad='$capacidad', Costo_Ini='$primerkm',Costo_KM='$subkm' WHERE Placa=''";

    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Propietario.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    desconectar($con);
?>