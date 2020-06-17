<?php 
    echo file_get_contents('Bootstrap/htmlBootstrap.html');
    require('server/conexion.php');
    $con=conectar();

    $sql='Select Nombre,Correo,Contra,Status from usuarios;';
    if($res=$con->query($sql)){
        //Obtener un array asociativo
        $datos=array();
        while($fila=$res->fetch_assoc()){
            $datos[]=$fila;
        }
        echo '<script>var usuarios='.json_encode($datos,JSON_PRETTY_PRINT).';</script>';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="styles/general.css">
</head>
<body>
    <div class="form-usuario">
        <div class="contenedor-form sombra-dark">
            <h1>Iniciar Sesión</h1>
            <div id="mensaje error">

            </div>
            <form id="autorizacion" action="server/login.php" method="post">
                <div class="campo-form">
                    <label >Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email"/>
                </div>
                <div class="campo-form">
                    <label >Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu password"/>
                </div>
                <div class="campo-form">
                    <input type="submit" class="btn btn-primario btn-block" value="Iniciar Sesión"/>
                </div>
            </form>
            <div class="campo-form">
                <div class="col-6">
                    <a class="btn btn-warning btn-block border" href="interfaces/recuperarCuenta.php">Recuperar Cuenta</a>
                </div>
                <div class="col-6">
                    <a class="btn btn-info btn-block border" href="interfaces/registro.php">Registrarse</a>
                </div>
            </div>
        </div>
    </div> 
    <script src="scripts/logIn.js"></script>
</body>
</html>
