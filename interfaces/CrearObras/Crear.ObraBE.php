<?php 
    require('../../server/conexion.php');

    $con=conectar();

    
    // asigna valor de las variables
    $Folio_Ob=$_POST['id'];
    $nombre=$_POST['nombreobra'];
    $Fec_Ini=$_POST['fecha'];
    $status1=$_POST['form'];

    $sql="UPDATE obras SET Nombre='$nombre', Fec_Ini='$Fec_Ini', Sta_Ob='$status1' WHERE Nombre=''";

    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Checadores.Obra.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    $con->close();

    
?>