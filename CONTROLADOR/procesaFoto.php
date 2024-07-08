<?php
include('../MODELO/modGaleria.php');

$fotoID = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($fotoID > 0) {
    $foto = obtenerFotoPorID($fotoID);
} else {
    $foto = null;
}
?>