<?php
include_once '../MODELO/modBorraInstrumental.php';

// Obtener el ID del producto a eliminar
$idProducto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Crear una instancia de la clase BorrarInstrumental y llamar al método para borrar el producto
$borrarProducto = new BorrarInstrumental();
$borrarProducto->borrarProducto($idProducto);

// Redirigir de vuelta a la página instrumental.php
header('Location: ../VISTA/instrumental.php');

?>