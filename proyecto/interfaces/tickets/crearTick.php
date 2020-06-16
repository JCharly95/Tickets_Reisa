<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <title>Creando Ticket</title>
    <link rel="stylesheet" href="../../styles/jquery.datetimepicker.min.css">
    <script type="text/javascript" src="../../scripts/jquery.js"></script>
    <script type="text/javascript" src="../../scripts/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript" src="validar.js"></script>



</head>

<body style="background: linear-gradient(to right, #34495e, #ebedef);">

    <?php
include ('../../server/conexion.php');
$conexion=conectar();
$NSS_Tick= $_POST["NSS_Tick"];
$pw= $_POST["pw"];
$nssrepetido=false;
$nssrepetido2=false;

$consulta = mysqli_query($conexion,"SELECT UserID FROM user_ticket");
$nssrepetido=false;
while($fila = mysqli_fetch_array($consulta)){
 if($NSS_Tick ==  $fila['UserID']){
    $nssrepetido=true;                              //El NSS del usuario tiene acceso a los tickets 
    break;
 }
}

if($nssrepetido){
    $consulta2 = mysqli_query($conexion,"SELECT * FROM usuarios WHERE NSS= $NSS_Tick");
    $n=mysqli_fetch_array($consulta2);
    if($n["Contra"] == $pw ){ 
        $nssrepetido2=true;              //La contra del NSS ingresado es correcto
    }
    else{
        $nssrepetido2=false; 
    }
    /*Checa la Contraseña de la tabla usuarios en la fila
    donde los NSS sean iguales
    */
}

if( $nssrepetido &&  $nssrepetido2){                 //NSS y Contra correctos
?>
    <div class="mx-auto card" style="width: 30%; background-color:#b3cbb1">
        <h5 class="card-header info-color white-text text-center py-10 bg-primary">
            <strong>Creando Ticket</strong>
        </h5>
        <div class="card-body px-lg-5">
            <form name="formul_ticket" class="text-center" action="creando_tick.php" method="POST">
                <div class="md-form mb-2">
                    <input id="datetime" class="form-control"name="fecha_hora" placeholder="Fecha y hora">
                </div>
                <script>
                    $("#datetime").datetimepicker();
                </script>

                <div class="md-form mb-2">
                    <input type="number" name="banco_km" class="form-control validate">
                    <label data-error="wrong" data-success="right">Banco_KM</label>
                </div>

                <div class="md-form mb-2">
                    <input type="number" name="distancia" class="form-control validate">
                    <label data-error="wrong" data-success="right">Distancia Actual</label>
                </div>

                <div class="md-form mb-2">
                    <input class="form-control" type="text" name="Placas">
                    <label data-error="wrong" data-success="right">Placas</label>
                </div>

                <button class="btn btn-info btn-block my-4" id="btn" type="button">Crear Ticket</button>
                </form>
            </div>
        </div>





        <?php
}
else{
    echo "El NSS ingresado no tiene acceso a tickets o sus datos son incorrectos
    <br>Verifique sus datos";
    ?>
            <form action="Tickets.php">
                <input type="submit" class="btn btn-primary btn-sm" value="aceptar">
            </form>
            <?php
}
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