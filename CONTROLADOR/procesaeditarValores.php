<?php
include_once '../MODELO/modeditarValores.php'; // Archivo del modelo

// Procesar el formulario si se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevosValores = trim($_POST['valores']); // Eliminar espacios en blanco innecesarios

    // Validación básica
    if (empty($nuevosValores)) {
        header('Location: ../VISTA/editarValores.php?error=Los valores no pueden estar vacíos.');
        exit();
    } else {
        try {
            // Actualizar los valores
            $actualizado = actualizarValores($nuevosValores);

            // Redireccionar con éxito
            header('Location: ../VISTA/editarValores.php?success=1');
            exit();
        } catch (Exception $e) {
            header('Location: ../VISTA/editarValores.php?error=' . urlencode('Error al actualizar los valores: ' . $e->getMessage()));
            exit();
        }
    }
} else {
    // Redirigir si no se envía el formulario
    header('Location: ../VISTA/editarValores.php');
    exit();
}
?>
