<?php
include_once '../MODELO/modeditarVision.php'; // Archivo del modelo

// Procesar el formulario si se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevaVision = trim($_POST['vision']); // Eliminar espacios en blanco innecesarios

    // Validación básica
    if (empty($nuevaVision)) {
        header('Location: ../VISTA/editarVision.php?error=La visión no puede estar vacía.');
        exit();
    } else {
        try {
            // Actualizar la visión
            $actualizado = actualizarVision($nuevaVision);

            // Redireccionar con éxito
            header('Location: ../VISTA/editarVision.php?success=1');
            exit();
        } catch (Exception $e) {
            header('Location: ../VISTA/editarVision.php?error=' . urlencode('Error al actualizar la visión: ' . $e->getMessage()));
            exit();
        }
    }
} else {
    // Redirigir si no se envía el formulario
    header('Location: ../VISTA/editarVision.php');
    exit();
}
?>
