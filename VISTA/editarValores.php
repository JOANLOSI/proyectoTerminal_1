<?php
include_once 'header.php';
include_once '../MODELO/modeditarValores.php';

// Obtener los valores actuales
$valoresActuales = obtenerValoresActuales();

// Manejo de mensajes
$mensaje = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $mensaje = 'Valores actualizados correctamente.';
} elseif (isset($_GET['error'])) {
    $mensaje = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
}
?>

<body>
    <div class="container-editar">
        <h2>Editar Valores</h2>

        <?php if ($mensaje) : ?>
            <script>
                alert('<?php echo $mensaje; ?>');
            </script>
        <?php endif; ?>

        <form action="../CONTROLADOR/procesaeditarValores.php" method="post">
            <textarea name="valores" rows="15" cols="70"><?php echo htmlspecialchars($valoresActuales, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <button type="submit">Guardar cambios</button>
        </form>
    </div>

    <a href="valores.php" class="fminvRegresar">REGRESAR</a>
</body>
<?php include_once 'footer.php'; ?>
</html>
