<?php
include '../MODELO/conexion.php';

// Verificar si se ha enviado un ID de producto válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idProducto = $_GET['id'];

    // Consultar la base de datos para obtener los detalles del producto
    $sql = "SELECT * FROM productos WHERE IDProducto = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idProducto);
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
            <input type="hidden" name="id" value="<?php echo $producto['IDProducto']; ?>">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $producto['Nombre']; ?>"><br>
            <label for="categoria">Categoría:</label><br>
            <input type="text" id="categoria" name="categoria" value="<?php echo $producto['categoria']; ?>"><br>
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion"><?php echo $producto['Descripcion']; ?></textarea><br>
            <label for="stock_minimo">Stock Mínimo:</label><br>
            <input type="number" id="stock_minimo" name="stock_minimo" value="<?php echo $producto['StockMinimo']; ?>"><br>
            <label for="existencia">Existencia:</label><br>
            <input type="number" id="existencia" name="existencia" value="<?php echo $producto['CantidadStock']; ?>"><br><br>
            <input type="submit" value="Actualizar">
        </form>
        
        <a href="inventario.php" class="fminvRegresar">REGRESAR</a>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>