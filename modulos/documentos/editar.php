<?php
include('../../conexion.php');




if ($_POST) {
 
    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $idcategoria=(isset($_POST['idcategoria'])?$_POST['idcategoria']:"");
    $idinstitucion=(isset($_POST['idinstitucion'])?$_POST['idinstitucion']:"");
    $motivo=(isset($_POST['motivo'])?$_POST['motivo']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $numero=(isset($_POST['numero'])?$_POST['numero']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");
    $miniatura=(isset($_FILES['miniatura']['name'])?$_FILES['miniatura']['name']:"");
    $documento=(isset($_FILES['documento']['name'])?$_FILES['documento']['name']:"");
    $tipo=(isset($_POST['tipo'])?$_POST['tipo']:"");
    $tamano=(isset($_POST['tamano'])?$_POST['tamano']:"");
    $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
    
    $sentencia=$conexion->prepare("UPDATE archivos SET idcategoria=:idcategoria,idinstitucion=:idinstitucion,motivo=:motivo,nombre=:nombre,numero=:numero,
    fecha=:fecha,tipo=:tipo,tamano=:tamano,descripcion=:descripcion WHERE id=:txtid");
    $sentencia->bindParam(":idcategoria",$idcategoria);
    $sentencia->bindParam(":idinstitucion",$idinstitucion);
    $sentencia->bindParam(":motivo",$motivo);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":numero",$numero);
    $sentencia->bindParam(":fecha",$fecha);
    $sentencia->bindParam(":tipo",$tipo);
    $sentencia->bindParam(":tamano",$tamano);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":txtid",$txtid);
    $sentencia->execute();


    $fechas=new DateTime();
    
    $nombreminiatura=($miniatura!='')?$fechas->getTimestamp()."_".$_FILES['miniatura']['name']:"";
    $tmp_miniatura=$_FILES['miniatura']['tmp_name'];
    if($tmp_miniatura!=''){
      move_uploaded_file($tmp_miniatura,"../../public/miniaturas/".$nombreminiatura);
      $sentencia=$conexion->prepare("SELECT miniatura FROM archivos WHERE id=:idtxt");
      $sentencia->bindParam(":idtxt",$txtid);
      $sentencia->execute();
      $registro_recuperado=$sentencia->fetch(PDO::FETCH_LAZY);
  
      if(isset($registro_recuperado['miniatura']) && $registro_recuperado['miniatura']!=""){
          if(file_exists("../../public/miniaturas/".$registro_recuperado['miniatura'])){
              unlink("../../public/miniaturas/".$registro_recuperado['miniatura']);
          }
      }
      $sentencia=$conexion->prepare("UPDATE archivos SET miniatura=:miniatura WHERE id=:txtid");
      $sentencia->bindParam(":miniatura",$nombreminiatura);
      $sentencia->bindParam(":txtid",$txtid);
      $sentencia->execute();

     
    }


    $nombredocumento=($documento!='')?$fechas->getTimestamp()."_".$_FILES['documento']['name']:"";
    $tmp_documento=$_FILES['documento']['tmp_name'];
    if($tmp_documento!=''){
      move_uploaded_file($tmp_documento,"../../public/documentos/".$nombredocumento);
      $sentencia=$conexion->prepare("SELECT documento FROM archivos WHERE id=:idtxt");
      $sentencia->bindParam(":idtxt",$txtid);
      $sentencia->execute();
      $registro_recuperado=$sentencia->fetch(PDO::FETCH_LAZY);
  
      if(isset($registro_recuperado['documento']) && $registro_recuperado['documento']!=""){
          if(file_exists("../../public/documentos/".$registro_recuperado['documento'])){
              unlink("../../public/documentos/".$registro_recuperado['documento']);
          }
      }
      $sentencia=$conexion->prepare("UPDATE archivos SET documento=:documento WHERE id=:txtid");
      $sentencia->bindParam(":documento",$nombredocumento);
      $sentencia->bindParam(":txtid",$txtid);
      $sentencia->execute();

     
    }

  
    
//    echo '<script>window.location.href = "index.php";</script>';
    
    }



?>



