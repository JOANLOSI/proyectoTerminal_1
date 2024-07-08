<?php
// Modelo: modCargaFoto.php

require_once 'conexion.php';

function guardarFoto($nombreFoto, $descripcion, $urlImagen, $fechaCarga, $categoria) {
    global $conexion;
    $sql = 'INSERT INTO galeriafotografica (NombreFoto, Descripcion, URLImagen, FechaCarga, Categoria) VALUES (:nombreFoto, :descripcion, :urlImagen, :fechaCarga, :categoria)';
    
    try {
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombreFoto', $nombreFoto);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':urlImagen', $urlImagen);
        $stmt->bindParam(':fechaCarga', $fechaCarga);
        $stmt->bindParam(':categoria', $categoria);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error al guardar la foto: ' . $e->getMessage();
        return false;
    }
}
?>
