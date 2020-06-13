<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Barra de Inicio</title>
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    
    <title>Inicio</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
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
            <a href="http://localhost/Web_3parcial/WEB_1/Inicio.php" class="btn blue-gradient btn-sm" ><i class="fas fa-home mr-1"></i>Inicio </a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-building mr-1"> </i>Obras</a>
            <a href="" class="btn blue-gradient btn-sm" ><i class="far fa-bookmark mr-1"> </i>Reportes </a>
            <a href="http://localhost/Web_3parcial/WEB_1/usuarios.php" class="btn blue-gradient btn-sm" ><i class="fas fa-users mr-1"> </i>Usuarios </a>

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


<a href="" class="btn btn-outline-dark btn-md btn-block"  data-toggle="modal" data-target="#IdentificarAdmin"><i class="fas fa-address-card "> Usuario Admin</i></a>

<div class="modal fade" id="IdentificarAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Cuenta Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form name="edit" action="cuentaAdmin.php" method="POST">
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





<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>


</body>
</html>