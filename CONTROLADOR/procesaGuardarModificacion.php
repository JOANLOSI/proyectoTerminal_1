<?php
include('../MODELO/modModificaFoto.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fotoID = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $categoriaID = isset($_POST['categoria']) ? (int)$_POST['categoria'] : 0;
    $nombreFoto = isset($_POST['nombreFoto']) ? trim($_POST['nombreFoto']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    $urlImagen = isset($_POST['urlImagen']) ? trim($_POST['urlImagen']) : '';
    $fechaCarga = isset($_POST['fechaCarga']) ? trim($_POST['fechaCarga']) : '';

    if ($fotoID > 0 && $categoriaID > 0 && $nombreFoto && $descripcion && $urlImagen && $fechaCarga) {
        $resultado = actualizarFoto($fotoID, $categoriaID, $nombreFoto, $descripcion, $urlImagen, $fechaCarga);
        if ($resultado) {
            header('Location: ../VISTA/galeria.php');
            exit();
        } else {
            echo "Error al actualizar la foto.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
