<?php
include_once 'conexion.php'; // Archivo de conexión

function obtenerVisionActual() {
    global $conexion;
    try {
        $query = "SELECT Vision FROM nosotros WHERE id = 1"; // Usar la columna `id` para identificar el registro
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Vision'] : "";
    } catch (PDOException $e) {
        throw new Exception("Error al recuperar la visión: " . $e->getMessage());
    }
}

function actualizarVision($nuevaVision) {
    global $conexion;
    try {
        $updateQuery = "UPDATE nosotros SET Vision = :vision WHERE id = 1"; // Usar la columna `id` para identificar el registro
        $stmt = $conexion->prepare($updateQuery);
        $stmt->bindParam(':vision', $nuevaVision, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw new Exception("Error al actualizar la visión: " . $e->getMessage());
    }
}
?>
