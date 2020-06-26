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
<div class="app">
    <div class="container border" >
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Seleciona el material</th>
                    </tr>
                </thead>
                <thead>
                    <form  id="seleccionar" action="Materiales.BE.php" method="post">
                        <div class="container-fluid"> 
                          <div class="row ">
                            <div class="col-9">
                              <h2>Materiales de obra</h2>
                            </div>  
                            <div class="col-3">
                                <button type="submit" class="btn btn-primario btn-block" > Siguiente </button>
                            </div>
                        </div>
                        </div>
                        <div id="mensaje error"></div>
                        <td>
                            <div class="input-group ">
                                <!-- <div class="campo-form">
                                  <label class="input-group-text" for="checador">Checador</label>
                                </div> -->
                                <select id="material" name="material" class="custom-select material" >
                                  <!-- usar la tabla que creo itz de crear usuarios -->
                                    <?php
                                        $sql="SELECT * FROM materiales";
                                        $query=$con->query($sql);

                                        if($query==true){
                                            echo '<option value="">Seleccione </option>';
                                            while($info=mysqli_fetch_array($query))
                                            {
                                                echo '<option value="'.$info['ID_Mat'].'" name="material" >'.$info['Descripcion'].' </option>';
                                            }
                                        }
                                        desconectar($con);
                                    ?>
                                </select>
                              </div>
                        </td>
                    </form>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="../../scripts/Obras/Materiales.js"></script>
</body>
</html>