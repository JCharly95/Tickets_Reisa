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
    $Folio= $_POST["Folio"];

    $conexion=conectar(); 
    $fecha= $_POST["fecha_hora"];
    $Banco_KM= $_POST["banco_km"];
    $Dist_Actual= $_POST["distancia"];
    $Placas=$_POST["Placas"];

    $M3;
    $CostoIni;
    $Costo_Subs;

    $consulta = mysqli_query($conexion,"SELECT * FROM camiones");
    $nssrepetido=false;
    while($fila = mysqli_fetch_array($consulta)){
        if($fila["Placa"] == $Placas){
            $M3= $fila["Capacidad"];
            $CostoIni= $fila["Costo_Ini"];     //Costo 1 KM
            $Costo_Subs= $fila["Costo_KM"];    //Costo subs
            $nssrepetido=true;
            break;
        }
      }
     
    if($nssrepetido){
        
        /*
        primer km = costo_1_km * (Distancia act -1)
        subsecuente= Costo_KM_subsecuente * (Banco_KM - Distancia Act)
        total= primer km + subsecuente
        */

    $primerKM= $CostoIni * ($Dist_Actual -1); 
    $subs= $Costo_Subs * ($Banco_KM - $Dist_Actual);
    $CostoM3 = $primerKM + $subs;
    $Importe= $CostoM3 * $M3;
    
    $sql= "UPDATE tickets SET Fec_Hor_Crea='$fecha', Banco_KM='$Banco_KM', Dist_Actual='$Dist_Actual',
    CostoM3='$CostoM3', Placas='$Placas', Importe='$Importe'  WHERE Folio_Tic = $Folio";
    $skl= mysqli_query($conexion,$sql); 

        if($skl){
            echo "Ticket Registrado exitosamente<br><br>
            fecha y hora: $fecha <br> Banco_KM: $Banco_KM KM<br> Distancia Act: $Dist_Actual KM
            <br> Placas: $Placas <br> Capacidad: $M3  M3<br> Costo/M3 : $$CostoM3  <br>
            Importe: $$Importe ";
        }
        else{
            echo "Error.<br>No se a podido realizar el ticket.";    
        }
    }
    else{
        echo "Error. No se encontraro las placas ingresadas <br>Verifique sus datos";
    }
    ?>
    <form action="tickets.php">
        <input type="submit" class="btn btn-sm btn-primary">
    </form>
    <?php
    
    
?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script> 

<?php
desconectar($conexion);
?>
</body>
</html>