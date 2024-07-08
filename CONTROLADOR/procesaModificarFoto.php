<?php
include_once '../MODELO/modModificaFoto.php';

// Verificar si se recibió un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fotoID = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nombreFoto = $_POST['nombreFoto'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';

    // Verificar si se subió una nueva imagen
    if ($_FILES['nuevaImagen']['error'] === UPLOAD_ERR_OK) {
        $rutaImagen = subirImagen($_FILES['nuevaImagen']);
        if (!$rutaImagen) {
            die("Error al subir la imagen.");
        }
    } else {
        $rutaImagen = null;
    }

    // Guardar los cambios en la base de datos
    if (modificarFoto($fotoID, $nombreFoto, $descripcion, $rutaImagen)) {
        // Redirigir a la página de detalles de la foto actualizada
        header("Location: ../VISTA/galeria.php");
        exit();
    } else {
        die("Error al intentar modificar la foto.");
    }
}

// Función para subir la nueva imagen
function subirImagen($imagen) {
    // Directorio donde se guardarán las imágenes
    $directorio = '../uploads/';

    // Generar un nombre único para la imagen
    $nombreArchivo = uniqid('img_') . '_' . $imagen['name'];

    // Mover la imagen al directorio deseado
    if (move_uploaded_file($imagen['tmp_name'], $directorio . $nombreArchivo)) {
        return $directorio . $nombreArchivo; // Devuelve la ruta completa de la imagen
    } else {
        return null;
    }
}
?>
