<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();
    // se va al admin
    //importar el nav de its
    echo file_get_contents('Barra.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../styles/general.css">
</head>
<body >
<div class="mx-auto card mt-5 gradient-card-header frozen-dreams-gradient" style="width: 30%;">
<h1 class="card-header text-center ">
    WELCOMEBACK @ADMIN
</h1>
</div>
</body>
</html>