<?php
    session_start();
    require('../server/conexion.php');
    $con=conectar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Reisa Tickets</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <span class="navbar-brand h1">Ingrese los datos solicitados</span>
    </div>
    <div class="container mt-5 mb-5">
        <div class="card col-md-6 offset-md-3 bg-link">
            <h5 class="card-header text-center">Datos del usuario</h5>
            <div class="card-body">
                <form name="registro" id="RegUser" action="../server/registrar.php" method="post">
                    <div id="mensaje error">

                    </div>
                    <div class="form-group">
                        <fieldset class="border pl-3 pr-3">
                            <legend>Datos Personales</legend>
                            <div class="form-group">
                                <label class="badge-light rounded">Numero de Seguridad Social:</label>
                                <input class="form-control" type="text" name="nss" placeholder="Ingrese su numero de afiliacion: solo los 11 digitos de este">
                            </div>
                            <div class="form-group">
                                <label class="badge-light rounded">Nombre Completo:</label>
                                <input class="form-control" type="text" name="nomUser" placeholder="Ingrese su nombre completo">
                            </div>
                            <div class="form-group">
                                <label class="badge-light rounded">Fecha de nacimiento:</label>
                                <input class="form-control" type="date" name="fechaNac">
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="border pl-3 pr-3">
                            <legend>Datos del Sistema</legend>
                            <div class="form-group">
                                <label class="badge-light rounded">Correo:</label>
                                <input class="form-control" type="text" name="email" placeholder="Ingrese su correo">
                            </div>
                            <div class="form-group">
                                <label class="badge-light rounded">Contrase&ntilde;a:</label>
                                <input class="form-control" type="password" name="contra" placeholder="Ingrese su contraseña">
                            </div>
                            <div class="form-group">
                                <label class="badge-light rounded">Tipo de Usuario:</label>
                                <select name="tipoUser" class="form-control">
                                    <option value="0" selected>Seleccione su tipo...</option>
                                    <?php
                                        $sql='Select * from tip_user';
                                        if($res=$con->query($sql)){
                                            while($registro=$res->fetch_assoc()){
                                                echo '<option value="'.$registro["ID_Tipo"].'">'.$registro["Descripcion"].'</option>';
                                            }
                                        }
                                        desconectar($con);
                                    ?>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" value="Registrarse" class="btn btn-primary btn-block">
                            </div>
                            <div class="col-6">
                                <a href="../index.php" class="btn btn-secondary btn-block"> Regresar al Inicio</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../scripts/registrar.js"></script>
</body>
</html>