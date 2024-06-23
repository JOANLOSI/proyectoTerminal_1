<?php
// Sanitizar los valores obtenidos de $_GET
$getExito = isset($_GET['exito']) ? ($_GET['exito'] == 'true' ? true : false) : false;
// Inicializar variables
$categoria = $nombre = $descripcion = $stockMinimo = $cantidadStock = '';
// Verificar si hay parámetros en la URL indicando que es una redirección después de guardar
if (isset($_GET['exito']) && $_GET['exito'] == 'true') {
    // Si es una redirección después de guardar, establecer los valores en blanco
    $categoria = $nombre = $descripcion = $stockMinimo = $cantidadStock = '';
} else {
    // Obtener los valores normales de los campos y sanitizarlos si es necesario
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $stockMinimo = isset($_POST['stockMinimo']) ? $_POST['stockMinimo'] : '';
    $cantidadStock = isset($_POST['cantidadStock']) ? $_POST['cantidadStock'] : '';
// Aplicar sanitización si es necesario
$categoria = htmlspecialchars($categoria);
$nombre = htmlspecialchars($nombre);
$descripcion = htmlspecialchars($descripcion);
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

<form action="../CONTROLADOR/procesaRegistroProducto.php" method="post" id="formProducto" class="formRegProd">
    <label for="categoria">CATEGORÍA:</label>
    <select id="categoria" name="categoria" required>
        <option value="">Selecciona una categoría</option>
        <option value="Endodoncia">Endodoncia</option>
        <option value="Ortodoncia">Ortodoncia</option>
        <option value="Instrumental">Instrumental</option>
        <option value="Equipo">Equipo</option>
        <option value="Diversos">Diversos</option>
    </select>
    <span class="error"><?php echo $errores['categoria'] ?? ''; ?></span>

    <label for="nombre">NOMBRE:</label>
    <input type="text" id="nombre" name="nombre" required>
    <span class="error"><?php echo $errores['nombre'] ?? ''; ?></span>

    <label for="descripcion">DESCRIPCIÓN:</label>
    <textarea id="descripcion" name="descripcion" rows="5" required></textarea>
    <span class="error"><?php echo $errores['descripcion'] ?? ''; ?></span>

    <label for="stockMinimo">STOCK MINÍMO:</label>
    <input type="number" id="stockMinimo" name="stockMinimo" min="1" required>
    <span class="error"><?php echo $errores['stockMinimo'] ?? ''; ?></span>

    <label for="cantidadStock">CANTIDAD EN STOCK:</label>
    <input type="number" id="cantidadStock" name="cantidadStock" min="1" required>
    <span class="error"><?php echo $errores['cantidadStock'] ?? ''; ?></span>

    <button type="submit">REGISTRAR PRODUCTO</button>
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