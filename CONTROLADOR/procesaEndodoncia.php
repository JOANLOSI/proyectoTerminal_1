<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modEndodoncia.php';

class ProcesaEndodoncia {
    private $model;

    public function __construct() {
        global $conexion; // Accede a la conexión definida en conexion.php
        $this->model = new ModEndodoncia($conexion); // Utiliza la conexión global
    }

    public function getProductosEndodoncia() {
        return $this->model->getProductosEndodoncia();
    }

    public function actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock) {
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
    echo "nombre";

    // Crear una instancia de ProcesaEndodoncia
    $procesaEndodoncia = new ProcesaEndodoncia();

    // Actualizar el producto en la base de datos
    $resultado = $procesaEndodoncia->actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock);

    if ($resultado) {
        // Redireccionar a endodoncia.php después de actualizar
        header("Location: ../VISTA/endodoncia.php");
        exit(); // Es importante terminar la ejecución del script después de la redirección
    } else {
        echo "Hubo un error al actualizar el producto.";
    }
} else {
    //echo "No se recibieron datos del formulario.";
}

?>