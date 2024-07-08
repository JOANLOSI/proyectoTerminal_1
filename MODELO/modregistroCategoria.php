<?php
require 'conexion.php';

function registrarCategoria($nombre) {
    global $conexion; // Usar la variable de conexión global
    
    try {
        $stmt = $conexion->prepare("INSERT INTO categorias (Nombre) VALUES (:Nombre)");
        $stmt->bindParam(':Nombre', $nombre);
        return $stmt->execute();
    } catch(PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return false;
    }
}
?>