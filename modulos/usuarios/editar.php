<?php

include('../../conexion.php');

if ($_POST) {
    
$txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
$nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
$usuario=(isset($_POST['usuario'])?$_POST['usuario']:"");
$password=(isset($_POST['password'])?$_POST['password']:"");
$correo=(isset($_POST['correo'])?$_POST['correo']:"");
$rol=(isset($_POST['rol'])?$_POST['rol']:"");
$sentencia=$conexion->prepare("UPDATE usuarios SET 
nombres=:nombre,usuario=:usuario,password=:password,correo=:correo,rol=:rol WHERE id=:txtid");
$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":usuario",$usuario);
$sentencia->bindParam(":password",$password);
$sentencia->bindParam(":correo",$correo);
$sentencia->bindParam(":rol",$rol);
$sentencia->bindParam(":txtid",$txtid);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';


}



?>



