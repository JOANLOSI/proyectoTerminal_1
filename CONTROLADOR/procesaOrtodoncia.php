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
   $nombre = $_POST['nombre'];
   $categoria = $_POST['categoria'];
   $descripcion = $_POST['descripcion'];
   $stockMinimo = $_POST['stockMinimo'];
   $cantidadStock = $_POST['cantidadStock'];
   echo "nombre";

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
