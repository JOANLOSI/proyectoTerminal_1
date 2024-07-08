<?php
include_once 'conexion.php';

// Función para obtener las categorías disponibles
function obtenerCategorias() {
    global $conexion;

    $query = "SELECT CategoriaID, Nombre FROM categorias";
    $statement = $conexion->prepare($query);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener los datos de una foto por su ID
function obtenerFotoPorID($fotoID) {
    global $conexion;

    $query = "SELECT * FROM galeriafotografica WHERE FotoID = ?";
    $statement = $conexion->prepare($query);
    $statement->execute([$fotoID]);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Función para modificar los datos de una foto en la base de datos
function modificarFoto($fotoID, $nombreFoto, $descripcion, $rutaImagen) {
    global $conexion;

    try {
        $query = "UPDATE galeriafotografica SET NombreFoto = ?, Descripcion = ?";
        $params = [$nombreFoto, $descripcion];

        // Agregar la actualización de la URL de la imagen si se proporcionó una nueva
        if ($rutaImagen) {
            $query .= ", URLImagen = ?";
            $params[] = $rutaImagen;
        }

        $query .= " WHERE FotoID = ?";
        $params[] = $fotoID;

        $statement = $conexion->prepare($query);
        return $statement->execute($params);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
