<?php
    
    $con=conectar();

    $sql="SELECT * FROM camiones WHERE ";
    $query=$con->query($sql);

    if($query==true){
        while($info=mysqli_fetch_array($query))
        {
            echo '<tr>';
            echo '<td value="'.$info['Placa'].'" name="'.$info['Placa'].' >'.$info['Placa'].' </td>';
            echo '<td value="'.$info['Capacidad'].'" name="'.$info['Capacidad'].' >'.$info['Capacidad'].' </td>';
            echo '<td value="'.$info['Costo_Ini'].'" name="'.$info['Costo_Ini'].' >'.$info['Costo_Ini'].' </td>';
            echo '<td value="'.$info['Costo_KM'].'" name="'.$info['Costo_KM'].' >'.$info['Costo_KM'].' </td>';
            echo '<tr>';
        }
    }
    desconectar($con);
?>