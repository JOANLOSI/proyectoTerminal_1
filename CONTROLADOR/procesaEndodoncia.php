<?php
if (!function_exists('obtenerProductosEndodoncia')) {
include '../MODELO/modEndodoncia.php';
} 
$registrosPorPagina = 5;

if (isset($_GET['pagina'])) {
    $paginaActual = $_GET['pagina'];
} else {
    $paginaActual = 1;
}

$offset = ($paginaActual - 1) * $registrosPorPagina;

$resultado = obtenerProductosEndodoncia($registrosPorPagina, $offset);
$totalRegistros = contarProductosEndodoncia();
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Incluye la vista
include '../VISTA/endodoncia.php';
?>