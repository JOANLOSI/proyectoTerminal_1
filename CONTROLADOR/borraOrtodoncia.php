<?php
include '../MODELO/modBorraOrtodoncia.php';

// Obtener el ID del producto a eliminar
$idProducto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Crear una instancia de la clase BorrarOrtodoncia y llamar al método para borrar el producto
$borrarProducto = new BorrarOrtodoncia();
$borrarProducto->borrarProducto($idProducto);

// Redirigir de vuelta a la página ortodoncia.php
header('Location: ../VISTA/ortodoncia.php');
?>