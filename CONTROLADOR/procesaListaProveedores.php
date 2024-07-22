<?php
require_once('../MODELO/conexion.php');
require_once('../MODELO/modListaProveedores.php');

$porPagina = 4;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina > 1) ? ($pagina * $porPagina - $porPagina) : 0;

$proveedores = obtenerProveedoresPaginacion($conexion, $inicio, $porPagina);
$totalProveedores = contarProveedores($conexion);
$numPaginas = ceil($totalProveedores / $porPagina);

include('../VISTA/proveedores.php');
?>
