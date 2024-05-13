<?php

include_once '../MODELO/modEndodoncia.php';
include_once '../MODELO/conexion.php';

// Verificar si se recibió un ID de producto
if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

    // Crear una instancia de conexión
    global $conexion; // Accede a la conexión definida en conexion.php

    // Crear una instancia de ModEndodoncia pasando la conexión como argumento
    $modEndodoncia = new ModEndodoncia($conexion);

    // Obtener el producto por su ID
    $producto = $modEndodoncia->getProductoPorId($idProducto);

    // Verificar si se encontró el producto
    if ($producto) {
        // Mostrar el formulario de edición con los datos del producto
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>

<body>
    <h1>Editar Producto</h1>
    <?php include_once 'header.php'; ?>
    <form action="../CONTROLADOR/procesaEndodoncia.php" method="POST">
        <!-- Campos del formulario con los datos del producto -->
        <input type="hidden" name="idProducto" value="<?php echo $producto['IDProducto']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['Nombre']; ?>"><br>
        <label for="categoria">Categoría:</label><br>
            <select id="categoria" name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="Endodoncia" <?php if ($producto['categoria'] == 'Endodoncia') echo 'selected'; ?>>Endodoncia</option>
                <option value="Ortodoncia" <?php if ($producto['categoria'] == 'Ortodoncia') echo 'selected'; ?>>Ortodoncia</option>
                <option value="Instrumental" <?php if ($producto['categoria'] == 'Instrumental') echo 'selected'; ?>>Instrumental</option>
                <option value="Equipo" <?php if ($producto['categoria'] == 'Equipo') echo 'selected'; ?>>Equipo</option>
                <option value="Diversos" <?php if ($producto['categoria'] == 'Diversos') echo 'selected'; ?>>Diversos</option>
            </select>
            <span class="error"><?php echo $errores['categoria'] ?? ''; ?></span><br>
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
