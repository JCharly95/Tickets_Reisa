<?php 
    echo file_get_contents('../Bootstrap/htmlBootstrap.html');
    require('../server/conexion.php');
    $con=conectar();

    $sql='Select Nombre,Correo,Sta_User from usuarios;';
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
    <link rel="stylesheet" href="../styles/general.css">
</head>
<body>
    <div class="form-usuario">
        <div class="contenedor-form sombra-dark">
            <h1>Olvidaste Tu Contraseña?</h1>
            <div id="mensaje error">

            </div>
            <div class="campo-form">
                <p>Teclea el correo que se te activo por el admin</p>
            </div>
            <form id="autorizacion" action="../server/recuperacion.php" method="post">
                <div class="campo-form">
                    <label>Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email"/>
                </div>
                <div class="campo-form">
                    <button type="submit" class="btn btn-primario btn-block">Recuperar Cuenta</button>
                </div>
                <div class="campo-form">
                    <a class="btn btn-info btn-block border" href="../index.php">Regresar a Iniciar Sesión</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../scripts/recuperarCuenta.js"></script>
</body>
</html>