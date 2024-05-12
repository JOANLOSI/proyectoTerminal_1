<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

function registrarProducto($categoria, $nombre, $descripcion, $stockMinimo, $cantidadStock) {
    global $conexion;

    // Validar y sanear los datos
    $categoria = validarCategoria($categoria);
    $nombre = validarNombre($nombre);
    $descripcion = validarDescripcion($descripcion);
    $stockMinimo = validarNumero($stockMinimo);
    $cantidadStock = validarNumero($cantidadStock);

    try {
        // Preparar la consulta SQL con parámetros
        $consulta = $conexion->prepare("INSERT INTO productos (categoria, Nombre, Descripcion, StockMinimo, CantidadStock) 
                                       VALUES (:categoria, :nombre, :descripcion, :stockMinimo, :cantidadStock)");

        // Bind de valores a los parámetros de la consulta
        $consulta->bindParam(':categoria', $categoria);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':stockMinimo', $stockMinimo);
        $consulta->bindParam(':cantidadStock', $cantidadStock);

        // Ejecutar la consulta
        $consulta->execute();

        return true; // Producto registrado con éxito
    } catch(PDOException $e) {
        return "Error al registrar el producto: " . $e->getMessage();
    }
}

function validarCategoria($categoria) {
    // Validar la categoría
    // Aquí puedes agregar tus propias reglas de validación
    // Por ejemplo, si solo aceptas ciertas categorías, puedes hacer una verificación adicional aquí
    return htmlspecialchars(trim($categoria));
}

function validarNombre($nombre) {
    // Validar el nombre
    // Por ejemplo, solo permitir letras, números, espacios y algunos caracteres especiales
    $nombre = ucwords(strtolower($nombre));
    return preg_match('/^[a-zA-Z0-9\sáéíóúÁÉÍÓÚ.,\-()]+$/', $nombre) ? htmlspecialchars(trim($nombre)) : '';
}

function validarDescripcion($descripcion) {
    // Validar la descripción
    // Por ejemplo, permitir letras, números, espacios y algunos caracteres especiales
    $descripcion = ucfirst(strtolower($descripcion));
    return htmlspecialchars(trim($descripcion));
}

function validarNumero($numero) {
    // Validar un número
    // Asegurarse de que sea un número entero positivo
    return filter_var($numero, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)));
}
?>

