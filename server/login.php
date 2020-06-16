<?php
    session_start();
    require('conexion.php');

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

    switch ($Sta_User){
        case 0:
            echo '<script>alert("Tu usuario fue dado de baja en el sistema");</script>';
            header('../index.php');
        break;
        case 1:
            echo '<script>alert("Tu usuario esta en proceso de ser activado, por favor ponte en contacto con los administradores");</script>';
            header('../index.php');
        break;
        case 2:
            echo '<script>alert("Bienvenido '.$nombre.'");</script>';
            $_SESSION['correo']=$correo;
            $_SESSION['contra']=$contra;
            header('../interfaces/Inicio/Inicio.php');
        break;
        default:
            echo '<script>alert("Hubo un error con tu usuario");</script>';
            header('../index.php');
            break;
    }
?>