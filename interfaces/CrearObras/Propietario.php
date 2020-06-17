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
                        <th>Coloca el nombre del porpietario</th>
                        <th>Cantidad de camiones del propietario<th>
                    </tr>
                </thead>
                <thead>
                    <form  id="propietario" action="./Obras.php" method="post">
                        <div class="container-fluid"> 
                            <div class="row ">
                                <div class="col-9">
                                    <h2>Propietario de Camiones</h2>
                                </div>  
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primario btn-block" value="Finalizar"/>
                                </div>
                            </div>
                        </div>
                        <div id="mensaje error"></div>
                        <td>
                            <div class="input-group ">
                                <select id="checador" name="checador" class="custom-select checador" >
                                <?php   
                                    $sql="SELECT NSS, Nombre FROM usuarios WHERE Tip_User=4 ";
                                    $query=$con->query($sql);

                                    if($query==true)
                                    {
                                        echo '<option value="" id="nombrePro">Seleccione </option>';
                                        while($info=mysqli_fetch_array($query)){
                                            echo '<option value="'.$info['NSS'].'" id="nombrePro" name="nombrePro" >'.$info['Nombre'].' </option>';
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                        </td>
                        <td>
                        <?php
                            $sql="SELECT COUNT(Placa) AS cantidad FROM camiones ";
                            $query=$con->query($sql);

                            if($query==true)
                            {
                                while($info=mysqli_fetch_array($query))
                                {
                                    $variable = $info['0'];
                                    echo '<input type="number" class="input-text" id="placas" name="placas" value="'.$variable.'" disabled/>';
                                }
                            }
                        ?>
                        </td>
                    </form>
                </thead>
            </table>
        </div>
    </div>
<script src="../../scripts/Obras/propietario.js"></script>
</body>
</html>