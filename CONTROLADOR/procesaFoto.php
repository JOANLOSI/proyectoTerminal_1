<?php
include('../MODELO/modGaleria.php');

$fotoID = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($fotoID > 0) {
    $foto = obtenerFotoPorID($fotoID);
} else {
    $foto = null;
}
?>