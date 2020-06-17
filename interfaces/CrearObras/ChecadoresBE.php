<?php 
    require('../../server/conexion.php');

    $con=conectar();
    // asigna valor de las variables
    $NSS=$_POST["checador"];
    // consulta 
    $consulta="SELECT MAX(Folio_Ob) FROM obras AS maximo";
    $query=$con->query($consulta);

    if($query==true)
    {
        while($info=mysqli_fetch_array($query))
        {
            $variable = $info['0'];
        }
    }
    $folioObra=$variable;

    $sql="INSERT INTO user_obra (ID_User_Obra, UserID, ObraID) VALUES ('NULL','$NSS', '$folioObra')";

    if($con->query($sql) == TRUE){
        header("Materiales.php");
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    desconectar($con);
?>