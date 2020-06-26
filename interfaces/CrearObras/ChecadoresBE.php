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

    $sql="INSERT INTO user_obra (UserID, ObraID) VALUES ('$NSS', '$folioObra')";

    if($con->query($sql) == TRUE){
        echo "<script languaje='Javascript'>window.location.href='Materiales.php'</script>";
    }else{
        echo "Error:".$sql."<br>".$con->error;
    }
    desconectar($con);
?>