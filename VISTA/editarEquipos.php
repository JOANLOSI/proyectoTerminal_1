<?php

include_once '../MODELO/modEquipos.php';
include_once '../MODELO/conexion.php';

// Verificar si se recibió un ID de producto
if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

    // Crear una instancia de conexión
    global $conexion; // Accede a la conexión definida en conexion.php

    // Crear una instancia de ModEquipos pasando la conexión como argumento
    $modEquipos = new ModEquipos($conexion);

    // Obtener el producto por su ID
    $producto = $modEquipos->getProductoPorId($idProducto);

    // Verificar si se encontró el producto
    if ($producto) {
        // Mostrar el formulario de edición con los datos del producto
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipos</title>
</head>

<body>
    <h1>EDITAR INVENTARIO DE EQUIPOS</h1>
    <?php include_once 'header.php'; ?>
    <form action="../CONTROLADOR/procesaEQUIPOS.php" method="POST">
        <!-- Campos del formulario con los datos del producto -->
        <input type="hidden" name="idProducto" value="<?php echo $producto['IDProducto']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['Nombre']; ?>"><br>
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $producto['categoria']; ?>"><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $producto['Descripcion']; ?></textarea><br>
        <label for="stockMinimo">Stock Mínimo:</label>
        <input type="number" id="stockMinimo" name="stockMinimo" value="<?php echo $producto['StockMinimo']; ?>"><br>
        <label for="cantidadStock">Existencia:</label>
        <input type="number" id="cantidadStock" name="cantidadStock" value="<?php echo $producto['CantidadStock']; ?>"><br>
        <button type="submit">ACTUALIZAR</button>
    </form>
</body>

</html>
<?php
    } else {
        echo "El producto no fue encontrado.";
    }
} else {
    echo "No se recibió el ID del producto.";
}
include_once 'footer.php';
?>