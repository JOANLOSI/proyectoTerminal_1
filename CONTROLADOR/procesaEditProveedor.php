<?php
session_start();

require_once('../MODELO/conexion.php');
require_once('../MODELO/modListaProveedores.php');

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $proveedorID = $_POST['ProveedorID'];
    $nombre = trim($_POST['nombre']);
    $direccion = trim($_POST['direccion']);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['email']);
    
    // Validar datos
    if (empty($nombre) || empty($direccion) || empty($telefono) || empty($email)) {
        $_SESSION['mensaje'] = 'Todos los campos son obligatorios.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: ../VISTA/editarProveedor.php?id=' . $proveedorID);
        exit();
    }

    // Actualizar datos del proveedor
    $resultado = actualizarProveedor($conexion, $proveedorID, $nombre, $direccion, $telefono, $email);

    if ($resultado) {
        $_SESSION['mensaje'] = 'Proveedor actualizado con éxito.';
        $_SESSION['tipo_mensaje'] = 'exito';
    } else {
        $_SESSION['mensaje'] = 'Error al actualizar el proveedor.';
        $_SESSION['tipo_mensaje'] = 'error';
    }

    header('Location: ../VISTA/editarProveedor.php?id=' . $proveedorID);
    exit();
} else {
    die("Acceso no autorizado.");
}
?>
