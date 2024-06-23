<?php
include('conexion.php');

function obtenerGaleria($offset, $limite) {
    global $conexion;

    try {
        // Preparar la consulta SQL con límite y desplazamiento para la paginación
        $sql = "SELECT FotoID, NombreFoto, Descripcion, URLImagen, FechaCarga FROM galeriafotografica LIMIT :limite OFFSET :offset";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error al recuperar las imágenes: " . $e->getMessage());
        echo "Se produjo un error al recuperar las imágenes. Por favor, inténtelo de nuevo más tarde.";
        exit();
    }
}

function contarImagenes() {
    global $conexion;

    try {
        // Preparar la consulta SQL para contar el total de imágenes
        $sql = "SELECT COUNT(*) as total FROM galeriafotografica";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (PDOException $e) {
        error_log("Error al contar las imágenes: " . $e->getMessage());
        echo "Se produjo un error al contar las imágenes. Por favor, inténtelo de nuevo más tarde.";
        exit();
    }
}

function obtenerFotoPorID($fotoID) {
    global $conexion;

    try {
        $sql = "SELECT FotoID, NombreFoto, Descripcion, URLImagen, FechaCarga FROM galeriafotografica WHERE FotoID = :fotoID";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':fotoID', $fotoID, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error al recuperar la imagen: " . $e->getMessage());
        echo "Se produjo un error al recuperar la imagen. Por favor, inténtelo de nuevo más tarde.";
        exit();
    }
}
?>
