<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Agregando Usuario</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">

<?php
include ("Conectate.php");
$id=$_POST["id"];

$nss =$_POST["defaultForm_NSS"];
$nombre=$_POST["defaultForm_name"];
$fec_nac=$_POST["defaultForm_fecha"];
$correo=$_POST["Correo"];
$contra=$_POST["defaultForm_pw"];
$tip_user=$_POST["type_user"];
$status=$_POST["status"];

$sql= "UPDATE usuarios SET NSS='$nss', nombre='$nombre', fec_nac='$fec_nac', correo='$correo',
contra='$contra', tip_user='$tip_user', estatus='$status' WHERE NSS=$id";

if($conexion ->query($sql) ==TRUE){
    echo"Usuario actualizado exitosamente";
}
else{
    echo"No se ha podido actualizar el usuraio";
}

?>
<form action="usuarios.php">
    <button type="submit" class="btn btn-sm btn-primary">aceptar</button>
</form>
<?php
$conexion->close();
?>
</body>
</html>