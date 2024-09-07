<?php 
include("../../conexion.php");

$sentencia=$conexion->prepare("SELECT * FROM categorias");
$sentencia->execute();
$categorias=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia=$conexion->prepare("SELECT * FROM instituciones");
$sentencia->execute();
$instituciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

if ($_POST) {

$idcategoria=(isset($_POST['idcategoria'])?$_POST['idcategoria']:"");
$idinstitucion=(isset($_POST['idinstitucion'])?$_POST['idinstitucion']:"");
$motivo=(isset($_POST['motivo'])?$_POST['motivo']:"");
$nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
$numero=(isset($_POST['numero'])?$_POST['numero']:"");
$fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");
//$miniatura=(isset($_FILES['miniatura']['name'])?$_FILES['miniatura']['name']:"");
$documento=(isset($_FILES['documento']['name'])?$_FILES['documento']['name']:"");
$tipo=(isset($_POST['tipo'])?$_POST['tipo']:"");
$tamano=(isset($_POST['tamano'])?$_POST['tamano']:"");
$descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");


$sentencia=$conexion->prepare("INSERT INTO archivos(id,idcategoria,idinstitucion, motivo,nombre,numero,fecha,documento,tipo,tamano,descripcion) 
VALUES(null,:idcategoria,:idinstitucion,:motivo,:nombre,:numero,:fecha,:documento,:tipo,:tamano,:descripcion)");
$sentencia->bindParam(":idcategoria",$idcategoria);
$sentencia->bindParam(":idinstitucion",$idinstitucion);
$sentencia->bindParam(":motivo",$motivo);
$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":numero",$numero);
$sentencia->bindParam(":fecha",$fecha);



$fechas=new DateTime();

/*$nombreminiatura=($miniatura!='')?$fechas->getTimestamp()."_".$_FILES['miniatura']['name']:"";
$tmp_miniatura=$_FILES['miniatura']['tmp_name'];
if($tmp_miniatura!=''){
  move_uploaded_file($tmp_miniatura,"../../public/miniaturas/".$nombreminiatura);
}*/

$nombredocumento=($documento!='')?$fechas->getTimestamp()."_".$_FILES['documento']['name']:"";
$tmp_documento=$_FILES['documento']['tmp_name'];
if($tmp_documento!=''){
  move_uploaded_file($tmp_documento,"../../public/documentos/".$nombredocumento);
}

//$sentencia->bindParam(":miniatura",$nombreminiatura);
$sentencia->bindParam(":documento",$nombredocumento);
$sentencia->bindParam(":tipo",$tipo);
$sentencia->bindParam(":tamano",$tamano);
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';

}


?>



