<?php
include("../../conexion.php");

if($_POST){

$nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
$descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
$sentencia=$conexion->prepare("INSERT INTO categorias(id,nombre,descripcion) VALUES(null,:nombre,:descripcion)");
$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';

}
?>
