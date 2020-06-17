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
        
            <div class="row">
                <form class="col-4" action="./ObrasBE.php" method="post">
                    <input
                        name="crearobra"
                        type="submit"
                        class="btn btn-primario btn-block"
                        value="Crear Obra"
                    />
                </form>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id Proyecto</th>
                            <th>Nombre Obra</th>
                            <th>Fecha de Inicio</th>
                            <th>Estatus</th>
                            <!-- <th>Opcion</th> -->
                        </tr>
                    </thead>
                    <thead>
                        <?php   
                                $sql="SELECT * FROM obras ";
                                $query=$con->query($sql);

                                if($query==true)
                                {
                                    while($info=mysqli_fetch_array($query))
                                    {
                                        echo'<tr>';
                                        echo'<td ><span class="resultado">'.$info['Folio_Ob'].'</span></td>';
                                        echo'<td ><span class="resultado">'.$info['Nombre'].'</span></td>';
                                        echo '<td ><input class="resultado" type="date" name="fechaobra" value="'.$info['Fec_Ini'].'" disabled/></td>';
                                        echo '<td ><span class="resultado">'.$info['Sta_Ob'].'</span></td>';
                                        echo'</tr>';
                                    }
                                }
                        ?>
                    </thead>
                    
                </table>
            </div>
        </div>
    </div>

</body>
</html>