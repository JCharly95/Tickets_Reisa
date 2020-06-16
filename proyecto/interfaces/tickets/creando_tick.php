<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <title>tickets</title>
</head>

<body style="background: linear-gradient(to right, #34495e, #ebedef);">
<?php 
    include ('../../server/conexion.php');
    $conexion=conectar(); 
    $fecha= $_POST["fecha_hora"];
    $Banco_KM= $_POST["banco_km"];
    $Dist_Actual= $_POST["distancia"];
    $Placas=$_POST["Placas"];

    $consulta = mysqli_query($conexion,"SELECT * FROM camiones");
    $nssrepetido=false;
    $fila;
    while($fila = mysqli_fetch_array($consulta)){
        if($fila["Placas"] == $Placas){
            $nssrepetido=true;
            break;
        }
      }
     
    if($nssrepetido){
        //1 km + (Dist_Km -1 )* subsecuente
        $prim_km= 33;
        
        $m3 = mysqli_query($conexion,"SELECT capacidad FROM camiones WHERE Placas= $Placas");
        
        $insert=mysqli_query($conexion,"INSERT INTO tickets (Fecha_Hora_Crear, Banco_KM, Dist_Actual, Placas, CostoM3, Importe) VALUES 
        ('$fecha','$Banco_KM','$Dist_Actual', '$Placas', )");            //costoM3 e importe    
    }
    else{
        echo "Error. No se encontraro las placas ingresadas <br>Verifique sus datos";
    ?>
    <form action="tickets.php">
        <input type="submit" class="btn btn-sm btn-primary">
    </form>
    <?php
    } 
    
?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script> 

</body>
</html>