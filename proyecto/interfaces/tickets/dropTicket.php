<!DOCTYPE html>
<html lang="en">
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body style="background: linear-gradient(to right, #34495e, #ebedef);">
    <?php
        include ('../../server/conexion.php');
        $conexion=conectar();

$NSS_Tick= $_POST["NSS_Tick"];
$pw= $_POST["pw"];
$nssrepetido=false;
$nssrepetido2=false;

$consulta = mysqli_query($conexion,"SELECT * FROM user_ticket");
$busca; $fila;
while($fila = mysqli_fetch_array($consulta)){
 if($NSS_Tick ==  $fila['UserID']){
    $busca= $fila["TicketID"];
    $nssrepetido=true;                              //El NSS del usuario tiene acceso a los tickets 
    break;
 }
}

if($nssrepetido){
    $consulta2 = mysqli_query($conexion,"SELECT * FROM usuarios WHERE NSS= $NSS_Tick");
    $n=mysqli_fetch_array($consulta2);
    if($n["Contra"] == $pw ){ 
        $nssrepetido2=true;              //La contra del NSS ingresado es correcto
    }
    else{
        $nssrepetido2=false; 
    }
}

if( $nssrepetido &&  $nssrepetido2){
?>
<div class="mx-auto card" style="width: 30%; background-color: rgba(86,61,124,.15);">
  <h5 class="card-header info-color white-text text-center py-10 bg-primary">
      <strong>Eliminar</strong>
  </h5>
  <div class="card-body px-lg-5">
<form class="text-center" style="color:#000000" action="Eliminar.php" method="POST">
    <label>Eliminar ticket</label> <br>
        <?php
          echo '<input type="text" name="id_" disabled=disabled  value="'.$fila['TicketID'].'" placeholder="'.$fila['TicketID'].'">';
          echo '<input type="text" value="'.$fila['TicketID'].'" name="folio" hidden>';
        ?><br>
        <input type="submit" class="btn btn-danger btn-sm mb-2" value="Eliminar">        
</form>
<form class="text-center" action="Tickets.php">
        <input type="submit" class="btn btn-primary btn-sm mb-2" value="Cancelar">
</form>
</div>
</div>


<?php
}
else{
    echo "El NSS ingresado no tiene acceso a tickets o sus datos son incorrectos
    <br>Verifique sus datos";
?>
    <form action="Tickets.php">
        <input type="submit" class="btn btn-primary btn-sm" value="aceptar">
    </form>
<?php
}

desconectar($conexion);

?>
  </body>
</html>
