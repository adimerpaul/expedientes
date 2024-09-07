<?php

$servidor = "localhost";
$db = "documentos";
$user = "root";
$password = "";

try {
    // Crear una nueva instancia de PDO
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $user, $password);
    
    // Establecer el conjunto de caracteres en UTF-8
    $conexion->exec("set names utf8mb4");

    // Opcional: Configurar el modo de error de PDO para que arroje excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $ex) {
    // Mostrar el mensaje de error si ocurre una excepción
    echo $ex->getMessage();
}

?>