<?php
include_once '../MODELO/modeditarMision.php'; // Archivo del modelo

// Obtener la misión actual
$misionActual = obtenerMisionActual();

// Manejo de mensajes
$mensaje = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $mensaje = 'Misión actualizada correctamente.';
} elseif (isset($_GET['error'])) {
    $mensaje = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
}
?>

<?php include_once 'header.php'; ?>
<body>
    <div class="container-editar">
        <h2>Editar Misión</h2>
        
        <?php if ($mensaje): ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form action="../CONTROLADOR/procesareditarMision.php" method="post">
            <textarea name="mision" rows="10" cols="50"><?php echo htmlspecialchars($misionActual, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <br>
            <button type="submit">Guardar cambios</button>
        </form>
    </div>
    <a href="mision.php" class="fminvRegresar">REGRESAR</a>
</body>
<?php include_once 'footer.php'; ?>
</html>
