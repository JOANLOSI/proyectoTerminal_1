<?php
require_once '../MODELO/conexion.php';

$fotosPorPagina = 8;
$paginaActual = (isset($_GET['p']) ? (int)$_GET['p']:1);
$inicio = ($paginaActual > 1) ? $paginaActual * $fotosPorPagina - $fotosPorPagina : 0;

if (!$conexion){
   die();
}

$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM galeriafotografica LIMIT $inicio, $fotosPorPagina");
$statement->execute();
$fotos = $statement->fetchAll();

if (!$fotos){
   header ('Location: formFoto.php');
}

//Conocer la cantidad de imagenes que s tienen y determinar cuantas páginas se utilizarán
$statement = $conexion->prepare("SELECT FOUND_ROWS() AS totalFilas");
$statement->execute();
$totalPost = $statement->fetch()['totalFilas'];
$totalPaginas = ceil($totalPost / $fotosPorPagina);
