<?php
include '../MODELO/modBorraDiversos.php';

// Obtener el ID del producto a eliminar
$idProducto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Crear una instancia de la clase BorrarDiversos y llamar al método para borrar el producto
$borrarProducto = new BorrarDiversos();
$borrarProducto->borrarProducto($idProducto);

// Redirigir de vuelta a la página endodoncia.php
header('Location: ../VISTA/diversos.php');
?>