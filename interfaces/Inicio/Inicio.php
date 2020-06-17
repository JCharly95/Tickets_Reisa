<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();

    // se va al admin
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="../../styles/general.css">

</head>

<body >
<?php 
    echo file_get_contents('./Barra.php');
?>

<div class="mx-auto card mt-5 gradient-card-header frozen-dreams-gradient" style="width: 30%;">
<h1 class="card-header text-center ">
    WELCOMEBACK @ADMIN
</h1>
</div>

</body>
</html>