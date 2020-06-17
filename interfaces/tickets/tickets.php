<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <title>tickets</title>
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
                <a href="../Inicio/Inicio.php" class="btn blue-gradient btn-sm"><i class="fas fa-home mr-1"></i>Inicio </a>
                <a href="../CrearObras/Obras.php" class="btn blue-gradient btn-sm"><i class="far fa-building mr-1"> </i>Obras</a>
                <a href="" class="btn blue-gradient btn-sm"><i class="far fa-bookmark mr-1"> </i>Reportes </a>
                <a href="../usuarios/usuarios.php" class="btn blue-gradient btn-sm" ><i class="fas fa-users mr-1"> </i>Usuarios </a>
                <a href="" class="btn blue-gradient btn-sm"><i class="fas fa-ticket-alt mr-1"> </i>Tickets </a>
            </ul>
            <!-- Links -->
            <div class="md-form my-0">
                <ul class="navbar-nav mr-auto">
                    <a href="../Admin/admin.php" class="btn blue-gradient btn-sm"><i class="fas fa-hammer mr-2"></i>Admin</a>
                    <a href="" class="btn blue-gradient btn-sm"><i class="fas fa-sign-out-alt mr-2 "></i>Salir</a>
                </ul>
            </div>

        </div>
        <!-- Collapsible content -->
    </nav>
    <!--/.Navbar-->


    <div class="card-header bg-default">
        <h3 class="row justify-content-center" style="margin-left: 550px">Tickets
            <a href="" style="margin-left: 550px" class="btn purple-gradient btn-sm"><i class="fas fa-plus mr-1"> </i>Subir </a>
        </h3> 
    </div>  
    <div style="background: #c8d0f2">
    <table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col"> Num. Folio</th>
      <th scope="col"> Placas</th>
      <th scope="col"> Distancia Actual</th>
      <th scope="col"> Fecha y Hora de Creación</th>
      <th scope="col"> CostoM3</th>
      <th scope="col"> Importe</th>
      <th scope="col"> Capacidad/M3</th>
    </tr>
  </thead>

        <?php 
              include ('../../server/conexion.php');
              $conexion=conectar();            
            //Todos los campos de la tabla ticket, sólo el campo de capacidad de la tabla camiones
            //donde las placas sean iguales
            $que = "SELECT *,
            Cam.Placa
            FROM tickets
            INNER JOIN camiones Cam ON tickets.Placas = Cam.Placa
            ";
                       
            $consulta= $conexion->query($que);
            if($consulta){
            while($fila = mysqli_fetch_array($consulta)){
                    
        ?>
  <tbody>
  <tr>
        <td> <?php echo $fila['Folio_Tic'] ?> </td>
        <td> <?php echo $fila['Placas']  ?> </td>
        <td> <?php echo $fila['Dist_Actual']  ?> </td>
        <td> <?php echo $fila['Fec_Hor_Crea']  ?> </td>
        <td> <?php echo $fila['CostoM3']  ?> </td>
        <td> <?php echo $fila['Importe']  ?> </td>
        <td> <?php echo $fila['Capacidad']  ?> </td>

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
    </div>
    <a href="" class="btn btn-primary btn-lg btn-block"  data-toggle="modal" data-target="#User_tick_crear"><i class="fas fa-plus-circle "> Crear Ticket</i></a>
    <a href="" class="btn btn-danger btn-lg btn-block"  data-toggle="modal" data-target="#User_tick_drop"><i class="fas fa-trash-alt"> Eliminar ticket</i></a>


    <!-- Para Identificar a Usuarios que tengan acceso a los tickets:
    NSS y contraseña con la que accedió a la plataforma
    -->

 <!-- Modal para agregar tickets (Altera los campos vacíos) -->   
<div class="modal fade" id="User_tick_crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Identificate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form name="crearTick" action="crearTick.php" method="POST">
    <div class="modal-body mx-3" >
        <div class="md-form mb-5">
          <i class="far fa-id-card prefix grey-text"></i>
          <input type="text" name="NSS_Tick" class="form-control validate">
          <label data-error="wrong" data-success="right">NSS Usuario</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="pw" class="form-control validate">
          <label data-error="wrong" data-success="right">Password User</label>
        </div>
    </div>
    
    <div class="modal-footer d-flex justify-content-center">
        <button type="submit"class="btn btn-danger" id="edit_button">Ingresar</button>
    </div>
    </div>
    </form>  
  </div>
</div>


<!-- Modal de Eliminar tickets -->
<div class="modal fade" id="User_tick_drop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Identificate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form name="crearTick" action="dropTicket.php" method="POST">
    <div class="modal-body mx-3" >
        <div class="md-form mb-5">
          <i class="far fa-id-card prefix grey-text"></i>
          <input type="text" name="NSS_Tick" class="form-control validate">
          <label data-error="wrong" data-success="right">NSS Usuario</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="pw" class="form-control validate">
          <label data-error="wrong" data-success="right">Password User</label>
        </div>
    </div>
    
    <div class="modal-footer d-flex justify-content-center">
        <button type="submit"class="btn btn-danger" id="edit_button">Ingresar</button>
    </div>
    </div>
    </form>  
  </div>
</div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script> 

<?php
desconectar($conexion);
?>
</body>
</html>