<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modModificaFoto.php';

// Verificar si se recibió un formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y validar datos del formulario
    $fotoID = (int)$_POST['id'];
    $nombreFoto = $_POST['nombreFoto'];
    $descripcion = $_POST['descripcion'];
    $categoriaID = (int)$_POST['categoria'];

    // Procesar la imagen si se subió una nueva
    $rutaImagen = null;
    if ($_FILES['nuevaImagen']['size'] > 0) {
        $rutaImagen = subirImagen($_FILES['nuevaImagen']);
    }

    // Llamar a la función para modificar la foto en la base de datos
    $exito = modificarFoto($fotoID, $nombreFoto, $descripcion, $categoriaID, $rutaImagen);

    // Redirigir con un parámetro success basado en el resultado de la modificación
    if ($exito) {
        header('Location: ../VISTA/modificarFoto.php?success=1&id=' . $fotoID);
    } else {
        header('Location: ../VISTA/modificarFoto.php?success=0&id=' . $fotoID);
    }
    exit();
} else {
    // Redirigir si se intenta acceder directamente sin método POST
    header('Location: ../VISTA/galeria.php');
    exit();
}
?>
