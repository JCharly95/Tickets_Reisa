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
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario como responsable</th>
                    </tr>
                </thead>
                <thead>
                    <form  id="seleccionar" action="./Materiales.php" method="post">
                        <div class="container-fluid">
                            <div class="row ">      
                                <div class="col-9">
                                    <h2>Checador</h2>
                                </div>  
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primario btn-block" value="Siguiente"/>
                                </div>
                            </div>
                        </div>
                        <div id="mensaje error"></div>
                        <td>
                            <div class="input-group ">
                                <!-- <div class="campo-form">
                                  <label class="input-group-text" for="checador">Checador</label>
                                </div> -->
                                <select id="checador" class="custom-select checador" >
                                  <!-- usar la tabla que creo itz de crear usuarios -->
                                    <option value="" selected>Selecciona </option>
                                  <option value="1">Jose</option>
                                  <option value="2">Roberto</option>
                                  <option value="3">Maria</option>
                                </select>
                            </div>
                        </td>
                    </form>
                </thead>    
            </table>
        </div>
    </div>
<script src="../../scripts/Obras/Obra.Checador.js"></script>
</body>
</html>