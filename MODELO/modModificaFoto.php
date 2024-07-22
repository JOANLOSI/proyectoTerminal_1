<?php
include_once 'conexion.php';

// Función para obtener las categorías disponibles
function obtenerCategoria() {
    global $conexion;

    $query = "SELECT CategoriaID, Nombre FROM categorias";
    $statement = $conexion->prepare($query);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener los datos de una foto por su ID
function obtenerFotosPorID($fotoID) {
    global $conexion;

    $query = "SELECT * FROM galeriafotografica WHERE FotoID = ?";
    $statement = $conexion->prepare($query);
    $statement->execute([$fotoID]);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Función para modificar los datos de una foto en la base de datos
function modificarFoto($fotoID, $nombreFoto, $descripcion, $categoriaID, $rutaImagen) {
    global $conexion;

    try {
        $query = "UPDATE galeriafotografica SET NombreFoto = ?, Descripcion = ?, CategoriaID = ?";
        $params = [$nombreFoto, $descripcion, $categoriaID];

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

// Función para subir una nueva imagen al servidor y retornar la ruta
function subirImagen($archivo) {
    // Implementar lógica para subir la imagen al servidor y retornar la ruta
    // Esto dependerá de la configuración de tu servidor y las reglas de tu aplicación
    // Aquí se debería validar el tipo de archivo, tamaño, etc.
    // Retorna la ruta de la imagen si se subió correctamente, de lo contrario, retorna null
    return null;
}
?>
