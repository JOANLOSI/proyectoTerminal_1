<?php
// Incluir el archivo de modelo para el registro de producto
include '../MODELO/modRegistroProducto.php';

// Define un array para almacenar los errores
$errores = [];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y validarlos
    $categoria = validarEntrada($_POST["categoria"]);
    $nombre = validarEntrada($_POST["nombre"]);
    $descripcion = validarEntrada($_POST["descripcion"]);
    $stockMinimo = validarEntrada($_POST["stockMinimo"]);
    $cantidadStock = validarEntrada($_POST["cantidadStock"]);

    // Validar cada campo individualmente
    if (empty($categoria)) {
        $errores['categoria'] = 'Por favor, seleccione una categoría.';
    }

    if (empty($nombre)) {
        $errores['nombre'] = 'Por favor, ingrese un nombre válido.';
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = 'Por favor, ingrese una descripción válida.';
    }

    if (empty($stockMinimo)) {
        $errores['stockMinimo'] = 'Por favor, ingrese un stock mínimo válido.';
    }

    if (empty($cantidadStock)) {
        $errores['cantidadStock'] = 'Por favor, ingrese una cantidad de stock válida.';
    }

    // Si no hay errores, procede con el registro del producto
    if (empty($errores)) {
        $resultado = registrarProducto($categoria, $nombre, $descripcion, $stockMinimo, $cantidadStock);

        if ($resultado === true) {
            header("Location: ../VISTA/formRegistroProducto.php?exito=true");
            exit; //Salir del script después de la redirección
        } else {
            echo $resultado;
        }
    }
}

function validarEntrada($dato) {
    // Sanitizar la entrada
    return htmlspecialchars(trim($dato));
}
?>