<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Uusarios</title>
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
    <script type="text/javascript" src="validar_usuarios.js"></script>

</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
    
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
            <a href="http://localhost/Web_3parcial/WEB_1/Inicio.php"class="btn blue-gradient btn-sm" ><i class="fas fa-home mr-1"></i>Inicio </a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-building mr-1"> </i>Obras</a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-bookmark mr-1"> </i>Reportes </a>
            <a href="http://localhost/Web_3parcial/WEB_1/Tickets.php" class="btn blue-gradient btn-sm" ><i class="fas fa-ticket-alt mr-1"> </i>Tickets </a>
            </ul>
            <!-- Links -->
            <div class="md-form my-0">
                <ul class="navbar-nav mr-auto">
                <a href="http://localhost/Web_3parcial/WEB_1/admin.php" class="btn blue-gradient btn-sm" ><i class="fas fa-hammer mr-2"></i>Admin</a>
                <a href="" class="btn blue-gradient btn-sm" ><i class="fas fa-sign-out-alt mr-2 "></i>Salir</a>
            </ul>
            </div>

        </div>
        <!-- Collapsible content -->
    </nav>
    <!--/.Navbar-->
    
    <div class="card-header bg-default"><h3 class="row justify-content-center">Usuarios</h3> </div>  
    <div style="background: #c8d0f2">
    <table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">NSS</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha_Nacimiento</th>
      <th scope="col">Correo</th>
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
        <td> <?php echo $fila['Nombre']  ?> </td>
        <td> <?php echo $fila['Fec_Nac']  ?> </td>
        <td> <?php echo $fila['Correo']  ?> </td>
        <td> <?php echo $fila['Tip_User']  ?> </td>
        <td> <?php echo $fila['Estatus']  ?> </td>

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
    </div>
<a href="" class="btn btn-primary btn-lg btn-block"  data-toggle="modal" data-target="#Admin_Add"><i class="fas fa-plus-circle "> Agregar Usuario</i></a>
<a href="" class="btn btn-danger btn-lg btn-block"  data-toggle="modal" data-target="#Admin_Edit"><i class="fas fa-edit "> Editar Usuario</i></a>

<div class="modal fade" id="Admin_Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Cuenta Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form name="edit" action="Admin_Add.php" method="POST">
    <div class="modal-body mx-3" >
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name="mail" class="form-control validate">
          <label data-error="wrong" data-success="right">Email Admin</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="pw" class="form-control validate">
          <label data-error="wrong" data-success="right">Password Admin</label>
        </div>
    </div>
    
    <div class="modal-footer d-flex justify-content-center">
        <button type="submit"class="btn btn-danger" id="edit_button">Ingresar</button>
    </div>
    </div>
    </form>  
  </div>
</div>




<div class="modal fade" id="Admin_Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Cuenta Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form name="edit" action="Admin_Edit.php" method="POST">
    <div class="modal-body mx-3" >
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name="mail" class="form-control validate">
          <label data-error="wrong" data-success="right">Email Admin</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="pw" class="form-control validate">
          <label data-error="wrong" data-success="right">Password Admin</label>
        </div>
    </div>
    
    <div class="modal-footer d-flex justify-content-center">
        <button type="submit"class="btn btn-danger" id="edit_button">Ingresar</button>
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