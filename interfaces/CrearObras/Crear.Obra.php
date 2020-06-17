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
                    <form  id="crearobra" action="./Checadores.Obra.php" method="post">
                        <div class="container-fluid"> 
                            <div class="row ">
                                <div class="col-9">
                                    <h2>Datos de Obra</h2>
                                </div>
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primario btn-block" value="Siguiente"/>
                                </div>
                            </div>
                        </div>
                        <div id="mensaje error"></div>

                        <td>
                            <input type="text" class="input-text" id="nomObra" name="nombreobra" placeholder="Nombre de Obra"/>
                        </td>
                        <td>
                            <input type="number"class="input-text"id="idObra" name="idobra" disabled/>
                        </td>
                        <td>
                            <input type="date" id="fechaObra" class="input-text" name="fecha" />
                        </td>
                        <td>
                            <div class="btn-group" data-toggle="buttons" >
                                <div class="boton">
                                    <button id="buttons" type="button" class="desactivado" onclick="estado('desactivado')" >Inactivo</button>
                                    <button id="buttons" type="button" class="activo" onclick="estado('activado')" name="boton2">Activo</button>
                                </div>
                            </div>
                        </td>
                    </form>
                </thead>
            </table>
        </div>
    </div>
<script>
    function estado(val){
        const status=false
        if(val!='activado'&& val!='desactivado'){
            estatus = true;
            alert("Tu obra esta: "+val);
        }
        
        if(status==true){
            const mensaje = document.getElementById('mensaje error');
            const imprimir = document.createElement('p');
            imprimir.innerHTML = '<p class="mensaje error">No has seleccionado nada<p>';
            mensaje.appendChild(imprimir);
        }
    }
</script>
<script  src="../../scripts/Obras/Crear.Obra.js"></script>
</div>
</body>
</html>