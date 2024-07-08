<?php
include_once '../MODELO/modBorrarFoto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['confirmacion'] === 'confirmado') {
    $fotoID = (int)$_POST['id'];

    // Llamada a la función del modelo para borrar la foto
    if (eliminarFoto($fotoID)) {
        // Mostrar mensaje de éxito
        echo "La imagen se ha borrado exitosamente.";

        // Redireccionar a la galería después de borrar exitosamente
        header('Location: ../VISTA/galeria.php');
        exit();
    } else {
        // Mostrar mensaje de error
        echo "Error al intentar eliminar la foto.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
