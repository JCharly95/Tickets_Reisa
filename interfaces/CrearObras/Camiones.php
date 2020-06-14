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
<body>

    <!-- importar el nav de its -->
    <?php 
        echo file_get_contents('../InicioAdmin/Barra.php');
    ?>

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
                        
                    </tr>
                </thead>
                <thead>
                    <form  id="camiones" action="./Obras.php" method="post">
                        <div class="row ">
                            
                            <div class="col-3">
                                <!-- Boton modal -->
                                <button type="button" class="btn btn-success btn-secundario" data-toggle="modal" data-target="#crearCamion">
                                    Agregar
                                </button>              
                            </div>
                            <div class="col-6">
                                <h2>Camiones</h2>
                            </div>
                            <div class="col-3">
                                <input type="submit" class="btn btn-primario btn-block" value="Finalizar"/>
                            </div>
                        </div>
                    </form>
                </thead>
                <thead>
                    <div id="tablas Camiones">
                        
                    </div>
                        <tr> 
                            <td scope="col">${camiones.plc}</td>
                            <td scope="col">${camiones.c}</td>
                            <td scope="col">${camiones.p}</td>
                            <td scope="col">${camiones.s}</td>
                        </tr>
                </thead>    
            </table>
        </div>
    </div>
</div>
 
  <!-- Modal -->
  <div class="modal fade" id="crearCamion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Agregar Camión</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form for="guardar" id="guardar" action="./Camiones.php" method="GET">
                <div id="mensaje error"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="placa" class="contenedor-input">Placa:</label>
                                <input type="text" class="form-control input-text border" id="placa"  placeholder="UUU-777-A">
                                
                            </div>
                            <div class="form-group">
                                <label for="capacidad" class="contenedor-input">Capcaidad (m3):</label>
                                <input type="number" class="form-control input-text border" id="capacidad" min="1" placeholder="7 m3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primerkm" class="contenedor-input">Precio primer km:</label>
                                <input type="number" class="form-control input-text border" id="primerkm" placeholder="&#36;" min="0" max="1000">
                            </div>
                            <div class="form-group">
                                <label for="subkm" class="contenedor-input">Precio subsecuente km:</label>
                                <input type="number" class="form-control input-text border" id="subkm" placeholder="&#36;" min="0" max="1000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-secundario " data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar" class="btn btn-primary btn-secundario " >Guardar</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
</div>

<script src="../../scripts/Obras/CrearCamiones.js"></script>
</body>
</html>