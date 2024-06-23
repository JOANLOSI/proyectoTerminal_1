<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modOrtodoncia.php';

class ProcesaOrtodoncia
{
   private $model;

   public function __construct()
   {
      global $conexion; // Accede a la conexión definida en conexion.php
      $this->model = new ModOrtodoncia($conexion); // Utiliza la conexión global
   }

   public function getProductosOrtodoncia()
   {
      return $this->model->getProductosOrtodoncia();
   }

   public function actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock)
   {
      return $this->model->actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock);
   }
}

// Verificar si se recibieron los datos del formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Obtener los datos del formulario
   $idProducto = $_POST['idProducto'];
   $nombre = ucwords(strtolower($_POST['nombre'])); // Convertir la primera letra de cada palabra a mayúscula
   $categoria = $_POST['categoria'];
   $descripcion = ucfirst(strtolower($_POST['descripcion'])); // Convertir solo la primera letra de la primera palabra a mayúscula
   $stockMinimo = $_POST['stockMinimo'];
   $cantidadStock = $_POST['cantidadStock'];
   //echo "nombre";

   // Crear una instancia de ProcesaOrtodoncia
   $procesaOrtodoncia = new ProcesaOrtodoncia();

   // Actualizar el producto en la base de datos
   $resultado = $procesaOrtodoncia->actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock);

   if ($resultado) {
      // Redireccionar a ortodoncia.php después de actualizar
      header("Location: ../VISTA/ortodoncia.php");
      exit();
   } else {
      echo "Hubo un error al actualizar el producto.";
   }
} else {
   //echo "No se recibieron datos del formulario.";
}
