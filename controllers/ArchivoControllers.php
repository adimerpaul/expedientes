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
if ($method == "POST" && $request == '/'){
    $data = $_POST;
    $file = $_FILES['documento'];
    if (isset($_FILES['documento'])) {
        $file = $_FILES['documento'];
        $nombredocumento = $file['name'];
        $tmp_documento = $file['tmp_name'];

        $uploadDirectory = "../public/documentos/";
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
        if (move_uploaded_file($tmp_documento, $uploadDirectory . $nombredocumento)) {
            move_uploaded_file($tmp_documento, $uploadDirectory . $nombredocumento);
//            echo "Archivo subido correctamente";
        } else {
//            echo "Error al mover el archivo";
        }
    } else {
        echo "No se ha subido ningún archivo";
    }

    $sql = "INSERT INTO archivos(id,idcategoria,idinstitucion, motivo,nombre,numero,fecha,documento,tipo,tamano,descripcion)
VALUES(null,:idcategoria,:idinstitucion,:motivo,:nombre,:numero,:fecha,:documento,:tipo,:tamano,:descripcion)";
    $query = $conexion->prepare($sql);
    $query->bindParam(":idcategoria", $data['idcategoria']);
    $query->bindParam(":idinstitucion", $data['idinstitucion']);
    $query->bindParam(":motivo", $data['motivo']);
    $query->bindParam(":nombre", $data['nombre']);
    $query->bindParam(":numero", $data['numero']);
    $query->bindParam(":fecha", $data['fecha']);
    $query->bindParam(":documento", $nombredocumento);
    $query->bindParam(":tipo", $data['tipo']);
    $query->bindParam(":tamano", $data['tamano']);
    $query->bindParam(":descripcion", $data['descripcion']);
    $query->execute();
    echo json_encode(array("status" => 200, "message" => "Archivo creado correctamente"));
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