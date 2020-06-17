<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();
    // se va al admin
    //importar el nav de its
    echo file_get_contents('../Inicio/Barra.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../styles/general.css">
</head>
<body>
    <div class="app">
    <div class="container border" >
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Coloca el nombre del Porpietario</th>
                    </tr>
                </thead>
                <thead>
                    <form  id="propietario" action="./Camiones.php" method="post">
                        <div class="container-fluid"> 
                            <div class="row ">
                                <div class="col-9">
                                    <h2>Propietario de Camiones</h2>
                                </div>  
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primario btn-block" value="Siguiente"/>
                                </div>
                            </div>
                        </div>
                        <div id="mensaje error"></div>
                        <td>
                            <input type="text" class="input-text  " id="nombrePro" name="nombrePro" placeholder="Nombre Propietario"/>
                        </td>
                    </form>
                </thead>
            </table>
        </div>
    </div>
<script src="../../scripts/Obras/propietario.js"></script>
</body>
</html>