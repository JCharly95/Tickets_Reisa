<?php
$conexion = mysqli_connect('127.0.0.1:3308','root','');
if(!$conexion){
    die('La conexion no se ha podido realizar.'.mysqli_error());
} 

mysqli_select_db($conexion,"reisa");
?>