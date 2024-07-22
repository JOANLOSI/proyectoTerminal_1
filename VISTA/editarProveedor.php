<?php
session_start();

// Incluir archivo de conexión y funciones de modelo
require_once('../MODELO/conexion.php');
require_once('../MODELO/modListaProveedores.php');

// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener ID del proveedor desde la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID del proveedor no proporcionado.");
}

$proveedorID = $_GET['id'];

// Obtener datos del proveedor por su ID
$proveedor = obtenerProveedorPorID($conexion, $proveedorID);

if (!$proveedor) {
    die("Proveedor no encontrado.");
}

// Mostrar el mensaje almacenado en sesión
$mensaje = isset($_SESSION['mensaje']) ? htmlspecialchars($_SESSION['mensaje']) : '';
$tipo_mensaje = isset($_SESSION['tipo_mensaje']) ? $_SESSION['tipo_mensaje'] : '';
unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
unset($_SESSION['tipo_mensaje']); // Limpiar el tipo de mensaje después de mostrarlo
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mensaje = "<?php echo $mensaje; ?>";
            var tipoMensaje = "<?php echo $tipo_mensaje; ?>";
            if (mensaje) {
                if (tipoMensaje === 'exito') {
                    alert(mensaje);
                } else {
                    document.getElementById('errores').innerText = mensaje;
                }
            }
        });
    </script>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <h2>EDITAR PROVEEDOR</h2>
    <div class="body-modificar-foto">
        <form action="../CONTROLADOR/procesaEditProveedor.php" method="post" id="formulario" class="registro">

            <input type="hidden" name="ProveedorID" value="<?php echo htmlspecialchars($proveedor['ProveedorID']); ?>">

            <div>
                <label for="nombre">NOMBRE:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre: " value="<?php echo htmlspecialchars($proveedor['Nombre']); ?>" required><br />
            </div>

            <div>
                <label for="direccion">DIRECCIÓN:</label>
                <input type="text" name="direccion" id="direccion" placeholder="Dirección: " value="<?php echo htmlspecialchars($proveedor['Direccion']); ?>" required><br />
            </div>

            <div>
                <label for="telefono">TELEFONO:</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Teléfono: " pattern="[0-9]{10}" value="<?php echo htmlspecialchars($proveedor['Telefono']); ?>" required><br />
            </div>

            <div>
                <label for="email">EMAIL:</label>
                <input type="email" name="email" id="email" placeholder="Correo Electrónico: " value="<?php echo htmlspecialchars($proveedor['Email']); ?>" required><br />
            </div>

            <!-- Aquí se mostrarán los mensajes de error -->
            <div class="error-message" id="errores">
                <?php
                // Mostrar mensajes de error generados previamente si los hay
                if (isset($_GET['error'])) {
                    echo "<p>{$_GET['error']}</p>";
                }
                ?>
            </div>
            <br />

            <div class="formSubmit">
                <input type="submit" class="submit" name="submit" value="Actualizar">
            </div>
        </form>
        <a class="fminvRegresar" href="proveedores.php">Regresar</a>
        <?php require_once 'footer.php'; ?>
    </div>
</body>

</html>