<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();
    echo file_get_contents('../Inicio/Barra.php');
 
    // se va al admin
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../styles/general.css">
</head>
<body>
<!-- <script src="../../scripts/Obras/CrearCamiones.js"></script> -->

<div class="app">
    <div class="container border" >
        <div class="tabla">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Placas</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Precio Primer Km</th>
                    <th scope="col">Precio Subsecuente Km</th>
                    <th scope="col">Material</th>
                </tr>
            </thead>
            <div id="mensaje error"></div>
            <form  id="camiones" action="Camiones.BE.php" method="post">
                <div class="row ">
                    <div class="col-9">
                        <h2>Camiones</h2>
                    </div>
                    <!-- submit -->
                    <div class="col-3">
                        <button type="submit" class="btn btn-primario btn-block" >Siguiente </button>
                    </div>
                </div>
            <!-- arreglo  -->
            <thead>
                <td>
                    <input type="text" name="placa" id="placa" class="input-text" placeholder="Numero de Placa">
                </td>
                <td>
                    <input type="number" class="input-text " id="capacidad" name="capacidad" min="1" placeholder="7 m3">
                </td>
                <td>
                    <input type="number" class="input-text " id="primerkm" name="primerKm" placeholder="&#36;" min="0" max="1000">
                </td>
                <td>
                    <input type="number" class="input-text " id="subkm"  name="subKM" placeholder="&#36;" min="0" max="1000">
                </td>
                <td>
                    <?php
                    $sql="SELECT Material FROM camiones WHERE Placa=''";
                    $query=$con->query($sql);
                    if($query==true)
                    {
                        $info=mysqli_fetch_array($query);
                        echo '<input type="number" class="input-text " value="'.$info['Material'].'" name="material" disabled/>';
                        
                    }else{
                        echo "Error:".$sql."<br>".$con->error;
                    }
                    desconectar($con);
                ?>
                </td>
            </thead>
        </form>
            </table>
        </div>
    </div>
</div>
</body>
</html>