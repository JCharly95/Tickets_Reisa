<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Agregando Usuario</title>
</head>
<body>

<?php
include ("Conectate.php");
$nss =$_POST["defaultForm_NSS"];
$nombre=$_POST["defaultForm_name"];
$fec_nac=$_POST["defaultForm_fecha"];
$correo=$_POST["Correo"];
$contra=$_POST["defaultForm_pw"];
$tip_user=$_POST["type_user"];
$status=$_POST["status"];

$consulta = mysqli_query($conexion,"SELECT NSS FROM usuarios");
$nssrepetido=false;
while($fila = mysqli_fetch_array($consulta)){
 if($nss ==  $fila['NSS']){
    $nssrepetido=true;
    break;
 }
}

if($nssrepetido){
    echo "El nss ingresado ya existe <br> Favor de ingresar uno nuevo";
}
else{
$insert=mysqli_query($conexion,"INSERT INTO usuarios (NSS, nombre, fec_nac, correo, contra, tip_user, estatus) VALUES 
('$nss','$nombre','$fec_nac', '$correo', '$contra', '$tip_user', '$status')");    
if($insert){
    echo"Usuario agregado exitosamente";
}
else{
    echo"No se ha podido agregar el usuraio";
}
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