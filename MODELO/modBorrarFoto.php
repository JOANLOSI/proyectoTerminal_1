<?php
include_once 'conexion.php';  // Se incluye el archivo de conexión

function eliminarFoto($fotoID) {
    global $conexion;

    try {
        // Preparar la consulta SQL
        $consulta = "DELETE FROM galeriafotografica WHERE FotoID = ?";
        $stmt = $conexion->prepare($consulta);

        // Asignar parámetros
        $stmt->bindParam(1, $fotoID, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Verificar si se afectó alguna fila
        if ($stmt->rowCount() > 0) {
            return true;  // Éxito al eliminar
        } else {
            return false;  // No se encontró la foto o no se pudo eliminar
        }
    } catch (PDOException $e) {
        // Manejo de errores
        error_log("Error al eliminar la foto: " . $e->getMessage());
        return false;
    }
}
?>
