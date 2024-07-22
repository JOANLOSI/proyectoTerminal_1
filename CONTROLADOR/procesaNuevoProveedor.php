<?php
require_once('../MODELO/conexion.php');
require_once('../MODELO/modNuevoProveedor.php');

// Función para validar el teléfono
function validarTelefono($telefono) {
    return preg_match('/^[0-9]{10}$/', $telefono);
}

// Validar y limpiar los datos del formulario
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (!$nombre || !$direccion || !$telefono || !$email) {
    $error = "Todos los campos son obligatorios.";
} elseif (!validarTelefono($telefono)) {
    $error = "El teléfono debe contener 10 dígitos.";
} elseif (!$email) {
    $error = "El correo electrónico no es válido.";
}

if (isset($error)) {
    header("Location: ../VISTA/nuevoProveedor.php?error=" . urlencode($error));
    exit();
}

// Insertar nuevo proveedor en la base de datos
if (agregarProveedor($conexion, $nombre, $direccion, $telefono, $email)) {
    header("Location: ../VISTA/nuevoProveedor.php?mensaje=" . urlencode("Proveedor registrado exitosamente"));
    exit();
} else {
    header("Location: ../VISTA/nuevoProveedor.php?error=" . urlencode("Error al agregar el proveedor"));
    exit();
}
?>
