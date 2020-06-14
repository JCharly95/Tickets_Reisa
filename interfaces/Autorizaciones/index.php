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
            <h1>Iniciar Sesión</h1>
            <div id="mensaje error"></div>
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
                    <label >Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Tu password"
                    />
                </div>
                <div class="campo-form">
                    <input type="submit" 
                        class="btn btn-primario btn-block"                    
                        value="Iniciar Sesión"
                    />
                </div>

            </form>
            <a class="enlace-cuenta" href="./recuperarCuenta.php">Recuperar Cuenta</a>
        </div>
    </div> 
     <script src="../../scripts/Autorizaciones/logIn.js"></script>
</body>
</html>