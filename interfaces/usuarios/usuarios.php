<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Uusarios</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="./validar_usuarios.js"></script>
</head>

<body style="background: linear-gradient(to right, #34495e, #ebedef);">
    <?php
    include ('../../server/conexion.php');
    $conexion=conectar();
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
                    <a href="../InicioAdmin/Inicio.php" class="btn blue-gradient btn-sm"><i class="fas fa-home mr-1"></i>Inicio </a>
                    <a href="../CrearObras/Obras.php" class="btn blue-gradient btn-sm"><i class="far fa-building mr-1"> </i>Obras</a>
                    <a href="" class="btn blue-gradient btn-sm"><i class="fas fa-users mr-1"> </i>Usuarios </a>
                    <a href="../tickets/tickets.php" class="btn blue-gradient btn-sm"><i class="fas fa-ticket-alt mr-1"> </i>Tickets </a>
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
            <h3 class="row justify-content-center">Usuarios</h3>
        </div>
        <div style="background: #c8d0f2">
            <table class="table table-bordered">
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
                            <td>
                                <?php echo $fila['NSS'] ?> </td>
                            <td>
                                <?php echo $fila['Nombre']  ?> </td>
                            <td>
                                <?php echo $fila['Fec_Nac']  ?> </td>
                            <td>
                                <?php echo $fila['Correo']  ?> </td>
                            <td>
                                <?php echo $fila['Tip_User']  ?> </td>
                            <td>
                                <?php echo $fila['Sta_User']  ?> </td>
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
        <a href="" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#Admin_Add"><i class="fas fa-plus-circle "> Agregar Usuario</i></a>
        <a href="" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#Admin_Edit"><i class="fas fa-edit "> Editar Usuario</i></a>

        <div class="modal fade" id="Admin_Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Cuenta Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                    </div>
                    <form name="edit" action="Admin_Add.php" method="POST">
                        <div class="modal-body mx-3">
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
                            <button type="submit" class="btn btn-danger" id="edit_button">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Admin_Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Cuenta Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                    </div>
                    <form name="edit" action="Admin_Edit.php" method="POST">
                        <div class="modal-body mx-3">
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
                            <button type="submit" class="btn btn-danger" id="edit_button">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End your project here-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
        <?php
    desconectar($conexion);
  ?>
</body>

</html>