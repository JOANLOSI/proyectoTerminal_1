<?php
include('../MODELO/modGaleria.php');

$limite = 8; // Número de imágenes por página
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina - 1) * $limite;

$galeria = obtenerGaleria($offset, $limite);
$totalImagenes = contarImagenes();
$totalPaginas = ceil($totalImagenes / $limite);
?>
