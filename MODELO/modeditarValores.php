<?php
include_once 'conexion.php'; // Archivo de conexión

function obtenerValoresActuales() {
    global $conexion;
    try {
        $query = "SELECT Valores FROM nosotros WHERE id = 1"; // Usar la columna `id` para identificar el registro
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Valores'] : "";
    } catch (PDOException $e) {
        throw new Exception("Error al recuperar los valores: " . $e->getMessage());
    }
}

function actualizarValores($nuevosValores) {
    global $conexion;
    try {
        $updateQuery = "UPDATE nosotros SET Valores = :valores WHERE id = 1"; // Usar la columna `id` para identificar el registro
        $stmt = $conexion->prepare($updateQuery);
        $stmt->bindParam(':valores', $nuevosValores, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw new Exception("Error al actualizar los valores: " . $e->getMessage());
    }
}
?>
