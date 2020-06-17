<?php
    function conectar(){
        $conn=new mysqli('localhost','root','','reisa')or die('No ha sido posible conectarse debido a: '.mysql_error());
        return $conn;
    }
    
    function desconectar($conexion){
        $conexion->close();
    }
?>