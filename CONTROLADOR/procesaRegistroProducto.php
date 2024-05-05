<?php
// Incluir el archivo de modelo para el registro de producto
include '../MODELO/modRegistroProducto.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y validarlos
    $categoria = validarEntrada($_POST["categoria"]);
    $nombre = validarEntrada($_POST["nombre"]);
    $descripcion = validarEntrada($_POST["descripcion"]);
    $stockMinimo = validarEntrada($_POST["stockMinimo"]);
    $cantidadStock = validarEntrada($_POST["cantidadStock"]);

    // Registrar el producto en la base de datos
    $resultado = registrarProducto($categoria, $nombre, $descripcion, $stockMinimo, $cantidadStock);

    if ($resultado === true) {
      header("Location: ../VISTA/formRegistroProducto.php?exito=true");
      exit; //Salir del script después de la redirección
    } else {
        echo $resultado;
    }
}

function validarEntrada($dato) {
    // Sanitizar la entrada
    return htmlspecialchars(trim($dato));
}
?>
