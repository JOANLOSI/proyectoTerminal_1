<?php
function agregarProveedor($conexion, $nombre, $direccion, $telefono, $email) {
    try {
        // Preparar la consulta para evitar inyección SQL
        $sql = "INSERT INTO proveedores (Nombre, Direccion, Telefono, Email) VALUES (:nombre, :direccion, :telefono, :email)";
        $stmt = $conexion->prepare($sql);

        // Asignar los valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);

        // Ejecutar la consulta
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error al agregar el proveedor: " . $e->getMessage();
        return false;
    }
}
?>
