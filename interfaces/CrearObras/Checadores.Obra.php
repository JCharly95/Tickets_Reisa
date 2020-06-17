<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();
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
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario como responsable</th>
                        <th>Se Registrará en la obra:</th>
            
                    </tr>
                </thead>
                <thead>
                    <form  id="seleccionar" action="./ChecadoresBE.php" method="POST">
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
                                <select id="checador" name="checador" class="custom-select checador" >
                                <?php   
                                    $sql="SELECT NSS, Nombre FROM usuarios WHERE Tip_User>=1 AND Tip_User<=3 ";
                                    $query=$con->query($sql);

                                    if($query==true)
                                    {
                                        echo '<option value="" >Seleccione </option>';
                                        while($info=mysqli_fetch_array($query))
                                        {
                                        
                                            echo '<option value="'.$info['NSS'].'" name="nss" >'.$info['Nombre'].' </option>';
                                        }
                                    }
                                ?>
                                </select>
                                
                            </div>
                        </td>
                        <td>
                        <?php   
                                $sql="SELECT MAX(Folio_Ob) FROM obras AS maximo";
                                $query=$con->query($sql);

                                if($query==true)
                                {
                                    while($info=mysqli_fetch_array($query))
                                    {
                                        $variable = $info['0'];
                                        echo '<input type="number" class="input-text" id="id" name="folio" value="'.$variable.'" disabled/>';
                                    }
                                }
                            ?>
                        </td>
                    </form>
                </thead>    
            </table>
        </div>
    </div>
    
<script src="../../scripts/Obras/Obra.Checador.js"></script>

</body>
</html>