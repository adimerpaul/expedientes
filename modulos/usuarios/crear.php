<?php 

include("../../conexion.php");

if ($_POST) {
$nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
$usuario=(isset($_POST['usuario'])?$_POST['usuario']:"");
$password=(isset($_POST['password'])?$_POST['password']:"");
$correo=(isset($_POST['correo'])?$_POST['correo']:"");
$rol=(isset($_POST['rol'])?$_POST['rol']:"");
$sentencia=$conexion->prepare("INSERT INTO usuarios(id,nombres,usuario,password,correo,rol) 
VALUES(null,:nombre,:usuario,:password,:correo,:rol)");
$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":usuario",$usuario);
$sentencia->bindParam(":password",$password);
$sentencia->bindParam(":correo",$correo);
$sentencia->bindParam(":rol",$rol);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';


}



?>

