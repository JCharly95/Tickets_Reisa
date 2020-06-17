<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();

    $material=$_POST['material'];
    // se va al admin
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../styles/general.css">
</head>
<body>

    <!-- importar el nav de its -->
    <?php 
        echo file_get_contents('../InicioAdmin/Barra.php');
    ?>

<div class="app">
    <div class="container border" >
        <div class="tabla">
        <form  id="camiones" action="./Propietario.php" method="post">
            <div class="row ">
                <div class="col-3"> 
                    <!-- boton -->
                    <button type="button" class="btn btn-success btn-secundario" data-toggle="modal" data-target="#crearCamion">
                        Agregar
                    </button>
                </div>
                <div class="col-6">
                    <h2>Camiones</h2>
                </div>
                <!-- submit -->
                <div class="col-3">
                    <input type="submit" class="btn btn-primario btn-block" value="Siguiente"/>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Placas</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Precio Primer Km</th>
                    <th scope="col">Precio Subsecuente Km</th>
                </tr>
            </thead>
            <!-- arreglo  -->
            <thead>
                <?php
                    include 'Camiones.Be.Lista.php';
                ?> 
            </thead>    
            </table>
        </div>
    </div>
</div>

    <!-- desaparecer contenedor -->
    <div class="modal fade" id="crearCamion" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <!-- Ventana de dialogo -->
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <!-- clase -->
            <div class="modal-content">
                <!-- modal header-->
                <div class="modal-header">
                    <h2 id="tituloVentana" class="modal-title">Agregar Camión</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- cuerpo -->
                <div class="modal-body">
                    <form for="guardar" id="crearCamion" action="./Camiones.BE.php" method="POST">
                        <div id="mensaje error"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="placa" class="contenedor-input">Placa:</label>
                                        <input type="text" class="form-control input-text border" id="placa" name="placa"  placeholder="UUU-777-A">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="capacidad" class="contenedor-input">Capcaidad (m3):</label>
                                        <input type="number" class="form-control input-text border" id="capacidad" name="capacidad" min="1" placeholder="7 m3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="primerkm" class="contenedor-input">Precio primer km:</label>
                                        <input type="number" class="form-control input-text border" id="primerkm" name="primerKm" placeholder="&#36;" min="0" max="1000">
                                    </div>
                                    <div class="form-group">
                                        <label for="subkm" class="contenedor-input">Precio subsecuente km:</label>
                                        <input type="number" class="form-control input-text border" id="subkm"  name="subKM" placeholder="&#36;" min="0" max="1000">
                                    </div>
                                    <div class="form-group">
                                        <?php   
                                            $sql="SELECT * FROM materiales WHERE ID_Mat='$material'";
                                            $query=$con->query($sql);   
                                            if($query==true)
                                            {
                                                $info=mysqli_fetch_array($query);
                                                echo '<label for="subkm" class="contenedor-input">'.$info['Descripcion'].' Codigo:</label>';
                                                echo '<input type="number" class="form-control input-text border" value="'.$info['ID_Mat'].'" name="material" disabled/>';
                                                $variable=$info['ID_Mat'];
                                            }else{
                                            echo "Error:".$sql."<br>".$con->error;
                                            }
                                        ?> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- pie de pagina -->
                <div class="modal-footer">
                    <button class="btn btn-danger btn-secundario " type="button" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-secundario" id="crearCamion">Guardar</button>
                </div>
            </div>
        </div>
    </div>



<script src="../../scripts/Obras/CrearCamiones.js"></script>
</body>
</html>