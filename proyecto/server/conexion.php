<?php
    function conectar(){
        //servidor, usuario, contra, base de datos
        //Favor de crear en sus servidores mysql el usuario admin con la contraseña 12345 
        // para que se pueda hacer la busqueda de informacion en la base de datos de igual forma se puede agregar en la tabla de usuarios como un usuario mas
        $conn=new mysqli('127.0.0.1:3308','root','','reisainfo')or die('No ha sido posible conectarse debido a: '.mysql_error());
        return $conn;
    }
    
    function desconectar($conexion){
        $conexion->close();
    }
?>