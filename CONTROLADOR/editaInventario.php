<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../MODELO/conexion.php';

    // Definir las expresiones regulares para las validaciones
    $nombreRegex = "/^[a-zA-Z0-9\s]+$/";
    $categoriaRegex = "/^[a-zA-Z0-9\s]+$/";
    $stockMinimoRegex = "/^\d+$/";
    $existenciaRegex = "/^\d+$/";

    // Función para sanitizar los datos del formulario
    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Inicializar las variables con los datos del formulario
    $id = sanitize_input($_POST["id"]);
    $nombre = sanitize_input($_POST["nombre"]);
    $categoria = sanitize_input($_POST["categoria"]);
    $descripcion = sanitize_input($_POST["descripcion"]);
    $stockMinimo = sanitize_input($_POST["stock_minimo"]);
    $existencia = sanitize_input($_POST["existencia"]);

    // Validar los datos del formulario
    $errors = [];

    if (!preg_match($nombreRegex, $nombre)) {
        $errors[] = "El nombre no es válido";
    }

    if (!preg_match($categoriaRegex, $categoria)) {
        $errors[] = "La categoría no es válida";
    }

    if (!preg_match($stockMinimoRegex, $stockMinimo)) {
        $errors[] = "El stock mínimo no es válido";
    }

    if (!preg_match($existenciaRegex, $existencia)) {
        $errors[] = "La existencia no es válida";
    }

    // Si no hay errores, proceder a actualizar la base de datos
    if (empty($errors)) {
        // Preparar la consulta SQL
        $sql = "UPDATE productos SET Nombre=?, categoria=?, Descripcion=?, StockMinimo=?, CantidadStock=? WHERE IDProducto=?";
        $stmt = $conexion->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute([$nombre, $categoria, $descripcion, $stockMinimo, $existencia, $id]);

        // Redirigir de vuelta a la página de inventario con un mensaje de éxito
        header("Location: ../VISTA/inventario.php?Registro modificado de forma correcta");
        exit();
    } else {
        // Si hay errores, redirigir de vuelta al formulario con los mensajes de error
        header("Location: ../VISTA/formInventario.php?id=$id&errors=" . urlencode(implode(",", $errors)));
        exit();
    }
} else {
    // Si se intenta acceder a este script sin enviar el formulario, redirigir de vuelta al formulario
    header("Location: ../VISTA/formInventario.php");
    exit();
}
