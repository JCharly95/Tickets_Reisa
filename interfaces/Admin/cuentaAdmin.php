<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../scripts/validar_usuarios.js"></script>
    <title>CuentaAdmin</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
<?php
  include ('../../server/conexion.php');
  $conexion=conectar();

  $mailAdmin=$_POST["mail"];
  $pwAdmin=$_POST["pw"];
  $consulta = mysqli_query($conexion,"SELECT * FROM usuarios");
  $nssrepetido=false;
  $fila;
  while($fila = mysqli_fetch_array($consulta)){
    if($mailAdmin ==  $fila['Correo'] && $pwAdmin == $fila["Contra"] && $fila["Tip_User"]==5 && $fila["Sta_User"]==2 )  {  //Datos del Admin
        $nssrepetido=true;
        break;
    }
  }

  if($nssrepetido){
?>

<div class="mx-auto card" style="width: 30%; background-color: rgba(86,61,124,.15);">
  <h5 class="card-header info-color white-text text-center py-10 bg-primary">
      <strong>Configuración del ADMIN</strong>
  </h5>
  <div class="card-body px-lg-5">
    <form name="formul" class="text-center" style="color:#000000" action="../usuarios/editar.php" method="POST">
      <div class="md-form mb-2">
        <label data-error="wrong" data-success="right"> NSS antiguo </label>
        <?php
          echo '<input type="text" name="id_" disabled=disabled class="form-control  value="'.$fila['NSS'].'" placeholder="'.$fila['NSS'].'">';
          echo '<input type="text" value="'.$fila['NSS'].'" name="id" hidden>';
        ?>
      </div>
      <div class="md-form mb-2">
        <label data-error="wrong" data-success="right">NSS</label>
        <input type="text" name="defaultForm_NSS" class="form-control validate">
      </div>
      <div class="md-form mb-2">
        <label data-error="wrong" data-success="right">Nombre</label>
        <input type="text" name="defaultForm_name" class="form-control validate">
      </div>
      <div class="md-form mb-4">
        <label data-error="wrong" data-success="right">Fecha_Nacimiento</label>
        <input type="date" name="defaultForm_fecha" class="form-control validate">
      </div>
      <div class="md-form mb-4">
        <label data-error="wrong" data-success="right">Correo</label>
        <input type="email" name="Correo" class="form-control validate">
      </div>
      <div class="md-form mb-4">
        <label data-error="wrong" data-success="right" >Contraseña</label>
        <input type="password" name="defaultForm_pw" class="form-control validate">
      </div>
      <label class="mdb-main-label">Admin</label>
      <select name="type_user"class="mdb-select md-form colorful-select dropdown-primary form-control validate">
        <option value="5">administrador</option>
      </select>
      <label class="mdb-main-label">Status</label>
      <select name="status"class="mdb-select md-form colorful-select dropdown-primary form-control validate">
        <option value="">Seleccione</option>
        <option value="2">Activo</option>
        <option value="0">Inactivo</option>
      </select>
      <button id="boton" class="btn btn-outline-danger btn-rounded btn-block z-depth-0 my-4 waves-effect" type="button">Continuar</button>
    </form>
  </div>
</div>
<?php
  }
  else{
  echo "Solo el administrador dado de alta puede ingresar </b>Verifique sus datos e intente nuevamente";
?>
  <form action="admin.php">
      <button class="btn btn-primary" type="submit">Aceptar</button>
  </form>
<?php
  }
  desconectar($conexion);
?>
</body>
</html>