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
                        <th>Coloca el nombre del porpietario</th>
                        <th>Seleccione el camión del propietario<th>
                    </tr>
                </thead>
                <thead>
                    <form  id="propietario" action="Propietario.BE.php" method="post">
                        <div class="container-fluid"> 
                            <div class="row ">
                                <div class="col-9">
                                    <h2>Propietario de Camiones</h2>
                                </div>  
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primario btn-block" > Finalizar</button>
                                </div>
                            </div>
                        </div>
                        <div id="mensaje error"></div>
                        <td>
                            <div class="input-group ">
                                <select id="nombrePro" name="nombrePro" class="custom-select checador" >
                                    <?php
                                        $sql="SELECT NSS, Nombre FROM usuarios WHERE Tip_User=4 ";
                                        $query=$con->query($sql);

                                        if($query==true)
                                        {
                                            echo '<option value="" id="nombrePro">Seleccione </option>';
                                            while($info=mysqli_fetch_array($query))
                                            {
                                                echo '<option value="'.$info['NSS'].'" name="nombrePro"  >'.$info['Nombre'].'</option>';
                                                
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                        <div class="input-group ">
                                <select id="placas" name="placas" class="custom-select checador" >
                                    <?php
                                        $sql="SELECT Placa FROM camiones";
                                        $query=$con->query($sql);

                                        if($query==true)
                                        {
                                            echo '<option value="" id="placas">Seleccione </option>';
                                            while($info=mysqli_fetch_array($query))
                                            {
                                                echo '<option value="'.$info['Placa'].'" name="placas"  >'.$info['Placa'].'</option>';
                                            }
                                        }
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
<script src="../../scripts/Obras/propietario.js"></script>
</body>
</html>