<?php
session_start();
include("../../conexion.php");

if($_POST){

$idusuario=$_SESSION['login'];
$asunto=(isset($_POST['asunto'])?$_POST['asunto']:"");
$descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
$sentencia=$conexion->prepare("INSERT INTO mensajes(id,asunto,descripcion,idusuario) VALUES(null,:asunto,:descripcion,:idusuario)");
$sentencia->bindParam(":asunto",$asunto);
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->bindParam(":idusuario",$idusuario);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';

}
?>
