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
                        <th>Nombre Obra</th>
                        <th>Id Proyecto</th>
                        <th>Fecha de Inicio</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <thead>
                    <form  id="crearobra" action="./Crear.ObraBE.php" method="POST">
                        <div class="container-fluid"> 
                            <div class="row ">                                
                                <div class="col-9">
                                    <h2>Datos de Obra</h2>
                                </div>
                                <div class="col-3">
                                    <button id="" type="submit" class="btn btn-primario btn-block">Siguiente</button>
                                </div>  
                            </div>
                        </div>
                        
                        <div id="mensaje error"></div>
                        <td>
                            <input type="text" class="input-text" id="nomObra" name="nombreobra" placeholder="Nombre de Obra"/>
                        </td>
                        <td>
                        <?php   
                                $sql="SELECT Folio_Ob FROM obras WHERE Nombre=''";
                                $query=$con->query($sql);

                                if($query==true)
                                {
                                    while($info=mysqli_fetch_array($query))
                                    {
                                        echo '<input type="number" class="input-text" id="id" name="id" value="'.$info['Folio_Ob'].'" disabled/>';
                                    }
                                }
                            ?>
                            
                        </td>
                        <td>
                            <input type="date" id="fechaObra" class="input-text" name="fecha" />
                        </td>
                        <td>
                            <div class="form-group" data-toggled="buttons">
                                <label class="desactivado">
                                    <input id="inactivo" type="radio" name="form" value="inactivo" autocomplete="off" checked/> Inactivo
                                </label>
                                <label class="activo">
                                    <input id="activo" type="radio" name="form" value="activo" autocomplete="off"/> Activo
                                </label>
                            </div>
                        </td>
                    </form>
                </thead>    
            </table>
        </div>
    </div>
    
<script  src="../../scripts/Obras/Crear.Obra.js"></script>
</div>
</body>
</html>

