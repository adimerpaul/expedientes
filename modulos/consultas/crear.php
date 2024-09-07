<?php
include("../../conexion.php");

if($_POST){

$asunto=(isset($_POST['asunto'])?$_POST['asunto']:"");
$descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
$sentencia=$conexion->prepare("INSERT INTO mensajes(id,asunto,descripcion) VALUES(null,:asunto,:descripcion)");
$sentencia->bindParam(":asunto",$asunto);
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';

}
?>
