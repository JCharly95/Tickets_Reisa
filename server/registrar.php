<?php
    require('conexion.php');

    $NSS=$_POST['nss'];
    $nombre=$_POST['nomUser'];
    $dateNa=$_POST['fechaNac'];
    $email=$_POST['email'];
    $pass=$_POST['contra'];
    $tipo=$_POST['tipoUser'];
    //Se buscara el usuario
    $buscarUser=0;

    $con=conectar();
    //Buscamos si el usuario ya existe en la base de datos
    $sql='Select NSS from usuarios where Correo="'.$email.'" and Contra="'.$pass.'";';
    if($res=$con->query($sql)){
        $buscarUser=$res->num_rows;
        //Si el usuario ya existe lanzamos un aviso y enviamos al login
        if($buscarUser>0){
            echo '<script>alert("El usuario que deseas registrar ya existe en el sistema")</script>';
            desconectar($con);
            header('../index.php');
        }
        else{
            //Registramos al usuario en la base de datos
            $sql="Insert into usuarios values('".$NSS."','".$nombre."','".$dateNa."','".$email."','".$pass."',".$tipo.",1);";
            $res=$con->query($sql);
            echo '<script>alert("El usuario fue registrado en el sistema y esta en proceso de ser activado.")</script>';
            desconectar($con);
            header('../index.php');
        }
    }
?>