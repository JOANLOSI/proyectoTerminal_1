<?php
include 'conexion.php';

function obtenerProductosEndodoncia($registrosPorPagina, $offset) {
    global $conexion;
    $sql = "SELECT * FROM productos WHERE categoria = 'endodoncia' LIMIT :limite OFFSET :offset";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':limite', $registrosPorPagina, PDO::PARAM_INT);
    $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function contarProductosEndodoncia() {
    global $conexion;
    $sqlTotal = "SELECT COUNT(*) AS total FROM productos WHERE categoria = 'endodoncia'";
    $statement = $conexion->prepare($sqlTotal);
    $statement->execute();
    $rowTotal = $statement->fetch(PDO::FETCH_ASSOC);
    return $rowTotal['total'];
}
?>