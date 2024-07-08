<?php
include_once 'conexion.php';

function obtenerFotoPorID($fotoID) {
    global $conexion;
    $editar = "SELECT * FROM galeriafotografica WHERE FotoID = ?";
    $stmt = $conexion->prepare($editar);
    $stmt->execute([$fotoID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function actualizarFoto($fotoID, $nombreFoto, $descripcion, $urlImagen) {
    global $conexion;
    $editar = "UPDATE galeriafotografica SET NombreFoto = ?, Descripcion = ?, URLImagen = ? WHERE FotoID = ?";
    $stmt = $conexion->prepare($editar);
    return $stmt->execute([$nombreFoto, $descripcion, $urlImagen, $fotoID]);
}
?>
