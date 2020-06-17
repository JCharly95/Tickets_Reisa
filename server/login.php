<?php
    session_start();
    require('conexion.php');
    $con=conectar();

    $nombre='';
    $correo=$_POST['email'];
    $contra=$_POST['password'];
    $Sta_User=4;

    $sql='Select Nombre,Sta_User from usuarios where Correo="'.$correo.'";';
    if($res=$con->query($sql)){
        while($fila=$res->fetch_assoc()){
            $Sta_User=$fila['Sta_User'];
            $nombre=$fila['Nombre'];
        }
    }

    desconectar($con);

    switch ($Sta_User){
        case 0:
            echo "<script languaje='Javascript'>alert('Tu usuario fue dado de baja en el sistema.');
            window.location.href='../index.php'</script>";
        break;
        case 1:
            echo "<script languaje='Javascript'>alert('Tu usuario esta en proceso de ser activado, por favor ponte en contacto con los administradores.');
            window.location.href='../index.php'</script>";
        break;
        case 2:
            $_SESSION['correo']=$correo;
            $_SESSION['contra']=$contra;
            echo "<script languaje='Javascript'>alert('Bienvenido ".$nombre."');
            window.location.href='../interfaces/Inicio/Inicio.php'</script>";
        break;
        default:
            echo "<script languaje='Javascript'>alert('El usuario no fue encontrado');
            window.location.href='../index.php'</script>";
            break;
    }
?>