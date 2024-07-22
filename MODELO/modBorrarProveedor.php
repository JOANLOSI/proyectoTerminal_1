<?php
function borrarProveedor($conexion, $proveedorID) {
    try {
        $sql = "DELETE FROM proveedores WHERE ProveedorID = :proveedorID";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':proveedorID', $proveedorID, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error al borrar el proveedor: " . $e->getMessage();
        return false;
    }
}
?>
