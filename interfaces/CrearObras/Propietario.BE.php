<?php 
    require('../../server/conexion.php');
    
    $con=conectar();

    $nombre=$_POST['nombrePro'];
    $placas=$_POST['placas'];

    $sql="INSERT INTO user_camion(UserID , CamionID) VALUES ('$nombre', '$placas')";
    
    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Obras.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    desconectar($con);
?>