<?php
    require('conexion.php');

    $email=$_POST['email'];
    $nombre='';
    $correo='';
    $contra='';

    $con=conectar();
    //Buscamos si el usuario ya existe en la base de datos
    $sql='Select Nombre,Correo,Contra from usuarios where Correo="'.$email.'";';
    if($res=$con->query($sql)){
        //Obtener un array asociativo
        while($fila=$res->fetch_assoc()){
            $nombre=$fila['Nombre'];
            $correo=$fila['Correo'];
            $contra=$fila['Contra'];
        }
    }
    desconectar($con);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../styles/general.css">
</head>
<body>
    <div class="form-usuario">
        <div class="contenedor-form sombra-dark">
            <h1>Estos fueron los datos encontrados</h1>
            <div class="campo-form">
            </div>
            <form>
                <div class="campo-form">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" readonly/>
                </div>
                <div class="campo-form">
                    <label>Correo:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $correo; ?>" readonly/>
                </div>
                <div class="campo-form">
                    <label>Contraseña:</label>
                    <input type="text" name="contra" class="form-control" value="<?php echo $contra; ?>" readonly/>
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