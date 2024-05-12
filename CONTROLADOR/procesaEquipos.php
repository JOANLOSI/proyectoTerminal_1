<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modEquipos.php';

class ProcesaEquipos
{
   private $model;

   public function __construct()
   {
      global $conexion; // Accede a la conexión definida en conexion.php
      $this->model = new ModEquipos($conexion); // Utiliza la conexión global
   }

   public function getProductosEquipos()
   {
      return $this->model->getProductosEquipos();
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

   // Crear una instancia de ProcesaEquipos
   $procesaEquipos = new ProcesaEquipos();

   // Actualizar el producto en la base de datos
   $resultado = $procesaEquipos->actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock);

   if ($resultado) {
      // Redireccionar a endodoncia.php después de actualizar
      header("Location: ../VISTA/equipos.php");
      exit();
   } else {
      echo "Hubo un error al actualizar el producto.";
   }
} else {
   //echo "No se recibieron datos del formulario.";
}
