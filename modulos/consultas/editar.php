<?php

include('../../conexion.php');

//editar datos
    if($_POST){
        $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
        $asunto=(isset($_POST['asunto'])?$_POST['asunto']:"");
        $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
        $sentencia=$conexion->prepare("UPDATE mensajes SET asunto=:asunto, descripcion=:descripcion WHERE id=:txtid");
        $sentencia->bindParam(":asunto",$asunto);
        $sentencia->bindParam(":descripcion",$descripcion);
        $sentencia->bindParam(":txtid",$txtid);
        $sentencia->execute();
        echo '<script>window.location.href = "index.php";</script>';
        
        }


?>


