<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modInstrumental.php';

class ProcesaInstrumental
{
   private $model;

   public function __construct()
   {
      global $conexion; // Accede a la conexión definida en conexion.php
      $this->model = new ModInstrumental($conexion); // Utiliza la conexión global
   }

   public function getProductosInstrumental()
   {
      return $this->model->getProductosInstrumental();
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

   // Crear una instancia de ProcesaInstrumental
   $procesaInstrumental = new ProcesaInstrumental();

   // Actualizar el producto en la base de datos
   $resultado = $procesaInstrumental->actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock);

   if ($resultado) {
      // Redireccionar a instrumental.php después de actualizar
      header("Location: ../VISTA/instrumental.php");
      exit();
   } else {
      echo "Hubo un error al actualizar el producto.";
   }
} else {
   //echo "No se recibieron datos del formulario.";
}
