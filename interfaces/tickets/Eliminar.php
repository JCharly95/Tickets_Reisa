<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <title>Eliminar Ticket</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
    <?php
        include ('../../server/conexion.php');
        $conexion=conectar();
        $Fol=$_POST["folio"];
        $busqueda = mysqli_query($conexion, "SELECT Folio_Tic FROM tickets WHERE Folio_Tic= '$Fol'");
        $registros = mysqli_num_rows($busqueda);

        if($registros > 0){
            echo "$registros <br> $Fol<br>";
        $elimina1 = "DELETE FROM user_ticket WHERE TicketID = '$Fol'";
        mysqli_query($conexion,$elimina1);

        $elimina = "DELETE FROM tickets WHERE Folio_Tic = '$Fol'";
        mysqli_query($conexion,$elimina);
        echo "El ticket fue encontrado y eliminado exitosamente";
        }
        else{
            echo "Error.<br>No se ha podido eliminar el ticket";
        }
        
    ?>

    <form action="./tickets.php">
        <input type="submit" class="btn btn-primary btn-sm" value="aceptar"> 
    </form>
    
    <?php
        desconectar($conexion);
    ?>
</body>
</html>