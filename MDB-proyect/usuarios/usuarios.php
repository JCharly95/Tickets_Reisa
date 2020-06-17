<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="validar_usuarios.js"></script>


</head>

<body>
    
<?php 
include ("Conectate.php") ;
?>

    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="#"></a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
            <a href="http://localhost/Web_3parcial/MDB-proyect/Inicio.php" class="btn blue-gradient btn-sm" ><i class="fas fa-home mr-1"></i>Inicio </a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-building mr-1"> </i>Obras</a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-bookmark mr-1"> </i>Reportes </a>
            </ul>
            <!-- Links -->
            <div class="md-form my-0">
                <ul class="navbar-nav mr-auto">
                <a href="" class="btn blue-gradient btn-sm" ><i class="fas fa-hammer mr-2"></i>Admi</a>
                <a href="" class="btn blue-gradient btn-sm" ><i class="fas fa-sign-out-alt mr-2 "></i>Salir</a>
            </ul>
            </div>

        </div>
        <!-- Collapsible content -->
    </nav>
    <!--/.Navbar-->
    
    <div class="card-header bg-default"><h3 class="row justify-content-center">Usuarios</h3> </div>  
             
    
    <table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">NSS</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha_Nacimiento</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Tipo_User</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>

        <?php 
            $consulta = mysqli_query($conexion,"SELECT * FROM usuarios");
            if($consulta){
            while($fila = mysqli_fetch_array($consulta)){
                    
        ?>
  <tbody>
  <tr>
        <td> <?php echo $fila['NSS'] ?> </td>
        <td> <?php echo $fila['nombre']  ?> </td>
        <td> <?php echo $fila['fec_nac']  ?> </td>
        <td> <?php echo $fila['correo']  ?> </td>
        <td> <?php echo $fila['contra']  ?> </td>
        <td> <?php echo $fila['tip_user']  ?> </td>
        <td> <?php echo $fila['estatus']  ?> </td>

    </tr>
    </tbody>
<?php 
    }
    }
    else{
        echo "No se ha podido realizar la consulta";
    }


?>
</table>
<a href="" class="btn btn-primary btn-lg btn-block half-width"  data-toggle="modal" data-target="#modalLoginForm"><i class="fas fa-plus-circle "> Agregar Usuario</i></a>
<button type="button" class="btn btn-danger btn-lg btn-block"><i class="fas fa-trash-alt "> Borrar</i></button>

<!-- Agrega registro-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Registrar</h4>
        <button type="button1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form name="formul" action="add_user.php" method="POST">
    <div class="modal-body mx-3" >
        <div class="md-form mb-5">
          <i class="fas fa-id-card prefix grey-text"></i>
          <input type="text" name="defaultForm_NSS" class="form-control validate">
          <label data-error="wrong" data-success="right">NSS</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-portrait prefix grey-text"></i>
          <input type="text" name="defaultForm_name" class="form-control validate">
          <label data-error="wrong" data-success="right">Nombre</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-calendar-alt prefix grey-text"></i>
          <input type="date" name="defaultForm_fecha" class="form-control validate">
          <label data-error="wrong" data-success="right">Fecha_Nacimiento</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" name="Correo" class="form-control validate">
          <label data-error="wrong" data-success="right">Correo</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="defaultForm_pw" class="form-control validate">
          <label data-error="wrong" data-success="right" >Contraseña</label>
        </div>

        <label class="mdb-main-label">Tipo de usuario</label>
          <select name="type_user"class="mdb-select md-form colorful-select dropdown-primary form-control validate">
          <option value="">seleccione</option>
            <option value="ADMIN">Admin</option>
            <option value="CHECK">Checador</option>
            <option value="ING_CIVIL">Ingeniero civil</option>
            <option value="TRANSPORT">Transportista</option>
        </select>

        <label class="mdb-main-label">Status</label>
          <select name="status"class="mdb-select md-form colorful-select dropdown-primary form-control validate">
            <option value="">Seleccione</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    
    <div class="modal-footer d-flex justify-content-center">
        <button type="button"class="btn btn-danger" id="boton">Registrar</button>
    </div>
    </div>
    </form>  
  </div>
</div>


    <!-- End your project here-->



    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

    <?php
    $conexion->close();
    ?>
</body>
</html>