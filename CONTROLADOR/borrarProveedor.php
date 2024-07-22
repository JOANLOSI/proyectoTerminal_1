<?php
require_once('../MODELO/conexion.php');
require_once('../MODELO/modBorrarProveedor.php');

if (isset($_GET['id'])) {
    $proveedorID = intval($_GET['id']);
    if (borrarProveedor($conexion, $proveedorID)) {
        header("Location: ../VISTA/proveedores.php?mensaje=Proveedor borrado exitosamente");
    } else {
        header("Location: ../VISTA/proveedores.php?error=No se pudo borrar el proveedor");
    }
} else {
    header("Location: ../VISTA/proveedores.php?error=ID de proveedor no válido");
}
exit();
?>
