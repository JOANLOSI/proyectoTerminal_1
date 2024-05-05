<?php
include '../MODELO/conexion.php';

$idProducto = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

if (!is_numeric($idProducto)) {
    echo "ID de producto no válido";
    exit;
}

try {
    // Preparar la consulta SQL
    $sql = "DELETE FROM productos WHERE IDProducto = :id";
    $stmt = $conexion->prepare($sql);

    // Vincular el parámetro con el ID del producto
    $stmt->bindParam(':id', $idProducto, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Producto eliminado correctamente";
    } else {
        throw new Exception("Error al eliminar el producto");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

header('Location: ../VISTA/inventario.php');
?>