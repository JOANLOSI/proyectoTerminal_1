<?php
function obtenerProveedoresPaginados($conexion, $inicio, $proveedoresPorPagina) {
    try {
        $sql = "SELECT * FROM proveedores LIMIT :inicio, :proveedoresPorPagina";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
        $stmt->bindParam(':proveedoresPorPagina', $proveedoresPorPagina, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener proveedores: " . $e->getMessage();
        return [];
    }
}

function contarProveedores($conexion) {
    try {
        $sql = "SELECT COUNT(*) FROM proveedores";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Error al contar proveedores: " . $e->getMessage();
        return 0;
    }
}

function obtenerProveedorPorID($conexion, $proveedorID) {
    try {
        $sql = "SELECT * FROM proveedores WHERE ProveedorID = :proveedorID";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':proveedorID', $proveedorID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener proveedor: " . $e->getMessage();
        return false;
    }
}

function actualizarProveedor($conexion, $proveedorID, $nombre, $direccion, $telefono, $email) {
    try {
        $sql = "UPDATE proveedores SET Nombre = :nombre, Direccion = :direccion, Telefono = :telefono, Email = :email WHERE ProveedorID = :proveedorID";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':proveedorID', $proveedorID, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error al actualizar proveedor: " . $e->getMessage();
        return false;
    }
}
?>
