<?php echo file_get_contents('../../Bootstrap/htmlBootstrap.html'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../../styles/general.css">
</head>

<body>
<div class="form-usuario">
        <div class="contenedor-form sombra-dark">
            <h1>Olvidaste Tu Contraseña?</h1>
            <div id="mensaje error"></div>
            <div class="campo-form"><p>Teclea el correo que se te activo por el admin</p></div>
            <form id="autorizacion">
                
                    <div class="campo-form">
                        <label >Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Tu email"
                        />
                    </div>
                    <div class="campo-form">
                        <input 
                            type="submit" 
                            class="btn btn-primario btn-block"                    
                            value="Recuperar Cuenta"
                        />
                    </div>
            </form>
            <a class="enlace-cuenta" href="./index.php">Ir Iniciar Sesión</a>
        </div>
    </div>
    <script src="../../scripts/Autorizaciones/recuperarCuenta.js"></script>
</body>
</html>