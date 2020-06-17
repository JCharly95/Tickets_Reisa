<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
<?php
    include ('../../server/conexion.php');
    $conexion=conectar();

    $mailAdmin=$_POST["mail"];
    $pwAdmin=$_POST["pw"];

    $consulta = mysqli_query($conexion,"SELECT * FROM usuarios");
    $nssrepetido=false;
    $fila;
    while($fila = mysqli_fetch_array($consulta)){
        if($mailAdmin ==  $fila['Correo'] && $pwAdmin == $fila["Contra"] && $fila["Tip_User"]==5 && $fila["Sta_User"]==2) {  //Datos del Admin
            $nssrepetido=true;
            break;
        }
    }

    if($nssrepetido){
    //Agregar nuevo registro
?>
<!--Editar registro-->
<div class="mx-auto card" style="width: 30%; background-color: rgba(86,61,124,.15);">
    <h5 class="card-header info-color white-text text-center py-10 bg-primary">
        <strong>Editar usuario</strong>
    </h5>
    <div class="card-body px-lg-5">
        <form name="edit" action="edit_user_formul.php" method="POST">
            <div class="modal-body mx-3" >
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right">Buscar NSS</label>
                    <input type="text" name="_NSS" class="form-control validate">
                </div>
            </div>
            <button type="submit"class="btn btn-danger form-control" id="edit_button">Buscar</button>
        </form>
<?php
    }
    else{
        echo "Datos erroneos.<br>Solo el Admin puede modificar usuarios";  //admin dado de alta
?>
        <form action="usuarios.php">
            <button class="btn btn-primary"> Aceptar</button>
        </form>
    </div>
</div>
<?php
    }
    desconectar($conexion);
?>
</body>
</html>