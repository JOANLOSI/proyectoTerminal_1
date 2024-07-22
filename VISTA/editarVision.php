<?php
include_once 'header.php';
include_once '../MODELO/modeditarVision.php';

// Obtener la visión actual
$visionActual = obtenerVisionActual();

// Manejo de mensajes
$mensaje = '';
$tipoMensaje = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $mensaje = 'Visión actualizada correctamente.';
    $tipoMensaje = 'success';
} elseif (isset($_GET['error'])) {
    $mensaje = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
    $tipoMensaje = 'error';
}
?>

<body>
    <div class="container-editar">
        <h2>Editar Visión</h2>

        <form action="../CONTROLADOR/procesareditarVision.php" method="post">
            <textarea name="vision" rows="10" cols="50"><?php echo htmlspecialchars($visionActual, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <button type="submit">Guardar cambios</button>
        </form>
    </div>

    <a href="vision.php" class="fminvRegresar">REGRESAR</a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoMensaje = '<?php echo $tipoMensaje; ?>';
            const mensaje = '<?php echo $mensaje; ?>';

            if (tipoMensaje === 'success') {
                alert(mensaje);
            } else if (tipoMensaje === 'error') {
                alert(mensaje);
            }
        });
    </script>
</body>
<?php include_once 'footer.php'; ?>
</html>
