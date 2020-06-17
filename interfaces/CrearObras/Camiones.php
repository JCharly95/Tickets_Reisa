<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();

    $material=$_POST['material'];
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
        <div class="tabla">
        <form  id="camiones" action="./Propietario.php" method="post">
            <div class="row ">
                <div class="col-3"> 
                    <!-- boton -->
                    <button type="button" class="btn btn-success btn-secundario" data-toggle="modal" data-target="#myModal">
                        Agregar
                    </button>
                </div>
                <div class="col-6">
                    <h2>Camiones</h2>
                </div>
                <!-- submit -->
                <div class="col-3">
                    <button type="submit" class="btn btn-primario btn-block" value="">Siguiente</button>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title" id="myModalLabel">Modal title</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

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

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-secundario " data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary btn-secundario">Save changes</button>
                </div>

            </form> 

                </div>
            </div><!-- modal content -->
        </div><!-- modal dialog -->
    </div><!-- modal fade -->
<!-- Cierra Modal -->


<script src="../../scripts/Obras/CrearCamiones.js"></script>

</body>
</html>


