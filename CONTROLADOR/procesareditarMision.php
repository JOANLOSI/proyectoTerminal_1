<?php
include_once '../MODELO/modeditarMision.php'; // Archivo del modelo

// Procesar el formulario si se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevaMision = trim($_POST['mision']); // Eliminar espacios en blanco innecesarios

    // Validación básica
    if (empty($nuevaMision)) {
        echo "<script>alert('La misión no puede estar vacía.'); window.location.href = '../VISTA/editarMision.php';</script>";
    } else {
        try {
            // Actualizar la misión
            $actualizado = actualizarMision($nuevaMision);

            // Mostrar un alert y redireccionar con confirmación
            echo "<script>
                if (confirm('Misión actualizada correctamente. ¿Deseas volver a la página de edición?')) {
                    window.location.href = '../VISTA/editarMision.php';
                }
            </script>";
            exit();
        } catch (Exception $e) {
            echo "<script>alert('Error al actualizar la misión: " . addslashes($e->getMessage()) . "'); window.location.href = '../VISTA/editarMision.php';</script>";
            exit();
        }
    }
} else {
    // Redirigir si no se envía el formulario
    header('Location: ../VISTA/editarMision.php');
    exit();
}
?>
