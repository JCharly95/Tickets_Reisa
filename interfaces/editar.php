<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Editando Usuario</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
<?php
    include ('../server/conexion.php');
    $conexion=conectar();
    $id=$_POST["id"];
    $nss =$_POST["defaultForm_NSS"];
    $nombre=$_POST["defaultForm_name"];
    $fec_nac=$_POST["defaultForm_fecha"];
    $correo=$_POST["Correo"];
    $contra=$_POST["defaultForm_pw"];
    $tip_user=$_POST["type_user"];
    $Sta_User=$_POST["Sta_User"];
    /*
    Sólo hay 1 admin registrado en la base de datos
    No puede darse de baja ni cambiar de puesto en estas condiciones.

    (Si hay 1 admin en BD y el puesto del usuario es Admin) y 
    (eligió otro  puesto o se dió de baja)

    $tru = false  => No puede darse esa condición=> error
    */
    $x=0; $y=0; $verdadero=0;

    $consulta = mysqli_query($conexion,"SELECT * FROM usuarios");
    $admi = mysqli_query($conexion,"SELECT * FROM usuarios WHERE NSS=$id");
    $n=mysqli_fetch_array($admi);
    while($fila = mysqli_fetch_array($consulta)){
        if($fila["Tip_User"]==1){           //Administradores
            $x++;
        }
    }
    if($x==1 &&  $n["Tip_User"]==1 && $Sta_User !=1){
        $verdadero=1;
    }
    else{
        $verdadero=2;
    }
    if($verdadero==2){
        $sql= "UPDATE usuarios SET NSS='$nss', Nombre='$nombre', Fec_Nac='$fec_nac', Correo='$correo',
        Contra='$contra', Tip_User='$tip_user', Sta_User='$Sta_User' WHERE NSS=$id";

        if($conexion ->query($sql) ==TRUE){
            echo"Usuario actualizado exitosamente";
        }
        else{
            echo"No se ha podido actualizar el usuraio";
        }
    }
    if($verdadero==1){
        echo "ERROR. Debe haber minimo 1 Admin dado de alta registrado en la Base de Datos<br>
        No puedes darte de baja ni cambiar de puesto si no hay ningún otro admin registrado en la BD";
    }
?>
    <form action="../usuarios/usuarios.php">
        <button type="submit" class="btn btn-sm btn-primary">aceptar</button>
    </form>
<?php
    desconectar($conexion);
?>
</body>
</html>