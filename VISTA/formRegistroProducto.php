<?php
// Verificar si hay parámetros en la URL indicando que es una redirección después de guardar
if (isset($_GET['exito']) && $_GET['exito'] == 'true') {
    // Establecer los valores de los campos en blanco
    $categoria = '';
    $nombre = '';
    $descripcion = '';
    $stockMinimo = '';
    $cantidadStock = '';
} else {
    // Obtener los valores normales de los campos (puedes manejar esto según tus necesidades)
    $categoria = $_POST['categoria'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $stockMinimo = $_POST['stockMinimo'] ?? '';
    $cantidadStock = $_POST['cantidadStock'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Producto</title>
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<?php
// Verificar si existe el parámetro en la URL indicando que se ha registrado el producto con éxito
if (isset($_GET['exito']) && $_GET['exito'] == 'true') {
    echo '<div id="mensaje-exito">Producto registrado con éxito</div>';
}
?>

<h1>Registro de Producto</h1>

<form action="../CONTROLADOR/procesaRegistroProducto.php" method="post" id="formProducto">
    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria" required>
        <option value="">Selecciona una categoría</option>
        <option value="Endodoncia">Endodoncia</option>
        <option value="Ortodoncia">Ortodoncia</option>
        <option value="Instrumental">Instrumental</option>
        <option value="Equipo">Equipo</option>
        <option value="Diversos">Diversos</option>
    </select>
    <span class="error"><?php echo $errores['categoria'] ?? ''; ?></span>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <span class="error"><?php echo $errores['nombre'] ?? ''; ?></span>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="5" required></textarea>
    <span class="error"><?php echo $errores['descripcion'] ?? ''; ?></span>

    <label for="stockMinimo">Stock Mínimo:</label>
    <input type="number" id="stockMinimo" name="stockMinimo" min="1" required>
    <span class="error"><?php echo $errores['stockMinimo'] ?? ''; ?></span>

    <label for="cantidadStock">Cantidad en Stock:</label>
    <input type="number" id="cantidadStock" name="cantidadStock" min="1" required>
    <span class="error"><?php echo $errores['cantidadStock'] ?? ''; ?></span>

    <button type="submit">Registrar Producto</button>
</form>

<script>
// Función para ocultar el mensaje de éxito después de 4 segundos
setTimeout(function() {
    var mensajeExito = document.getElementById('mensaje-exito');
    if (mensajeExito) {
        mensajeExito.style.display = 'none';
    }
}, 4000);
</script>

<script src="../js/validaciones.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>