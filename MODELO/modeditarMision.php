<?php
include_once 'conexion.php'; // Archivo de conexión

function obtenerMisionActual() {
    global $conexion;
    try {
        $query = "SELECT Mision FROM nosotros WHERE id = 1"; // Usar la columna `id` para identificar el registro
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Mision'] : "";
    } catch (PDOException $e) {
        throw new Exception("Error al recuperar la misión: " . $e->getMessage());
    }
}

function actualizarMision($nuevaMision) {
    global $conexion;
    try {
        $updateQuery = "UPDATE nosotros SET Mision = :mision WHERE id = 1"; // Usar la columna `id` para identificar el registro
        $stmt = $conexion->prepare($updateQuery);
        $stmt->bindParam(':mision', $nuevaMision, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw new Exception("Error al actualizar la misión: " . $e->getMessage());
    }
}

// Obtener la misión actual para mostrar en la vista
$misionActual = obtenerMisionActual();
?>
