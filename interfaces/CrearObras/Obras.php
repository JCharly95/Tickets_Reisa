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
            <div class="row">
                <form class="col-4" action="./Crear.Obra.php" method="post">
                    <input
                        name="crearobra"
                        type="submit"
                        class="btn btn-primario btn-block"
                        value="Crear Obra"
                    />
                </form>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre Obra</th>
                            <th>Id Proyecto</th>
                            <th>Fecha de Inicio</th>
                            <th>Estatus</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td ><span class="resultado">Encadenar texto</span></td>
                            <td ><span class="resultado">Encadenar texto</span></td>
                            <td ><input class="resultado" type="date" name="fechaobra" disabled/></td>
                            <td >
                                <span class="resultado correcto">Activo</span>
                            </td>
                            <td>
                                <button type="button" class="estado completo">Editar</button>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>