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
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="#"></a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="basicExampleNav">
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
            <a href="./Inicio.php" class="btn blue-gradient btn-sm" ><i class="fas fa-home mr-1"></i>Inicio </a>
            <a href="../CrearObras/Obras.php" class="btn blue-gradient btn-sm" ><i class="far fa-building mr-1"> </i>Obras</a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-bookmark mr-1"> </i>Reportes </a>
            <!-- HAY QUE COLOCARLO DIRECTO AL ARCHIVO  -->
            <a href="../usuarios/usuarios.php" class="btn blue-gradient btn-sm" ><i class="fas fa-users mr-1"> </i>Usuarios </a>

            </ul>
            <!-- Links -->
            <div class="md-form my-0">
                <ul class="navbar-nav mr-auto">
                <a href="http://localhost/Web_3parcial/WEB_1/admin.php" class="btn blue-gradient btn-sm" ><i class="fas fa-hammer mr-2"></i>Admin</a>
                <a href="../../index.php" class="btn blue-gradient btn-sm" ><i class="fas fa-sign-out-alt mr-2 "></i>Salir</a>
            </ul>
            </div>

        </div>
</nav>



</body>
</html>