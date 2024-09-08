<?php
include("../conexion.php");
$method = $_SERVER['REQUEST_METHOD'];
$request = str_replace('/expedientes/controllers/ArchivoControllers.php', '', $_SERVER['REQUEST_URI']);

//echo $request;
//exit;
if($method == "GET" && $request == '/'){
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT archivos.*, categorias.nombre as categoria, instituciones.nombre as institucion FROM archivos
    INNER JOIN categorias ON archivos.idcategoria=categorias.id
    INNER JOIN instituciones ON archivos.idinstitucion=instituciones.id WHERE archivos.id=:id";
        $query = $conexion->prepare($sql);
        $query->execute(array(":id" => $id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }else{
        $sql = "SELECT archivos.*, categorias.nombre as categoria, instituciones.nombre as institucion FROM archivos
 INNER JOIN categorias ON archivos.idcategoria=categorias.id
 INNER JOIN instituciones ON archivos.idinstitucion=instituciones.id";
        $query = $conexion->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}
if ($request == '/categoriasInstituciones') {
    $sql = "SELECT * FROM categorias";
    $query = $conexion->prepare($sql);
    $query->execute();
    $categorias = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM instituciones";
    $query = $conexion->prepare($sql);
    $query->execute();
    $instituciones = $query->fetchAll(PDO::FETCH_ASSOC);

    $data = array("categorias" => $categorias, "instituciones" => $instituciones);
    echo json_encode($data);
}
?>