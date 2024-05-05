<?php
// Función para actualizar el inventario en la base de datos
function actualizarInventario($conexion, $id, $nombre, $categoria, $descripcion, $stockMinimo, $existencia) {
    $sql = "UPDATE productos SET Nombre=?, categoria=?, Descripción=?, StockMinimo=?, CantidadStock=? WHERE IDProducto=?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $categoria, $descripcion, $stockMinimo, $existencia, $id]);
}

// Función para validar los datos del formulario
function validarDatos($nombre, $categoria, $stockMinimo, $existencia) {
    $nombreRegex = "/^[a-zA-Z0-9\s]+$/";
    $categoriaRegex = "/^[a-zA-Z\s]+$/";
    $stockMinimoRegex = "/^\d+$/";
    $existenciaRegex = "/^\d+$/";

    $errors = [];

    if (!preg_match($nombreRegex, $nombre)) {
        $errors[] = "El nombre no es válido";
    }

    if (!preg_match($categoriaRegex, $categoria)) {
        $errors[] = "La categoría no es válida";
    }

    if (!preg_match($stockMinimoRegex, $stockMinimo)) {
        $errors[] = "El stock mínimo no es válido";
    }

    if (!preg_match($existenciaRegex, $existencia)) {
        $errors[] = "La existencia no es válida";
    }

    return $errors;
}
?>