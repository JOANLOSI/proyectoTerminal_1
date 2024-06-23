<?php
include '../MODELO/conexion.php';

// Verificar si se ha enviado un ID de producto válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idProducto = (int)$_GET['id']; // Convertir a entero para mayor seguridad

    // Consultar la base de datos para obtener los detalles del producto
    $sql = "SELECT * FROM productos WHERE IDProducto = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idProducto, PDO::PARAM_INT);
    $stmt->execute();

    // Verificar si se encontró el producto
    if ($stmt->rowCount() > 0) {
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "El producto no existe.";
        exit; // Detener la ejecución si el producto no se encuentra
    }
} else {
    echo "ID de producto no proporcionado.";
    exit; // Detener la ejecución si no se proporciona el ID del producto
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="formulario">
        <h2>
            <center>Editar Producto</center>
        </h2>
        <form action="../CONTROLADOR/editaInventario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['IDProducto']); ?>">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars(ucwords(strtolower($producto['Nombre']))); ?>"><br>
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

            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion"><?php echo htmlspecialchars(ucfirst(strtolower($producto['Descripcion']))); ?></textarea><br>
            <label for="stock_minimo">Stock Mínimo:</label><br>
            <input type="number" id="stock_minimo" name="stock_minimo" value="<?php echo htmlspecialchars($producto['StockMinimo']); ?>"><br>
            <label for="existencia">Existencia:</label><br>
            <input type="number" id="existencia" name="existencia" value="<?php echo htmlspecialchars($producto['CantidadStock']); ?>"><br><br>
            <input type="submit" value="Actualizar">
        </form>

        <a href="inventario.php" class="fminvRegresar">REGRESAR</a>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
