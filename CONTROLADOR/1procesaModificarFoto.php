<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modModificaFoto.php';

// Verificar si se envió un formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $fotoID = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nombreFoto = isset($_POST['nombreFoto']) ? htmlspecialchars($_POST['nombreFoto'], ENT_QUOTES, 'UTF-8') : '';
    $descripcion = isset($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8') : '';

    // Lógica para manejar la URL de la imagen
    // En este ejemplo, suponemos que la imagen se guarda en un directorio y se guarda solo el nombre en la base de datos.
    $urlImagen = ""; // Debes implementar la lógica para manejar la URL de la imagen correctamente

    // Actualizar la foto en la base de datos
    $actualizacionExitosa = actualizarFoto($fotoID, $nombreFoto, $descripcion, $urlImagen);

    if ($actualizacionExitosa) {
        // Redirigir a una página de éxito o a donde corresponda
        header("Location: galeria.php");
        exit();
    } else {
        // Manejar errores si la actualización falla
        echo "Error al actualizar la foto. Por favor, inténtelo de nuevo más tarde.";
    }
} else {
    // Manejar la situación donde no se recibió un formulario POST
    echo "Acceso no autorizado.";
}
?>
