<?php

include('../../conexion.php');

//editar datos
    if($_POST){
        $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
        $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
        $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
        $sentencia=$conexion->prepare("UPDATE categorias SET nombre=:nombre, descripcion=:descripcion WHERE id=:txtid");
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":descripcion",$descripcion);
        $sentencia->bindParam(":txtid",$txtid);
        $sentencia->execute();
        echo '<script>window.location.href = "index.php";</script>';
        
        }


?>


