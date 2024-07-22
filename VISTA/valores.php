<?php
include_once 'header.php';
include_once '../MODELO/modeditarValores.php';

// Obtener los valores actuales
$valoresActuales = obtenerValoresActuales();
?>

<body>
    <div class="container-valores">
        <img src="../img/marco3.svg" alt="Marco" class="marco-valores">
        <div class="texto-valores">
            <h2 class="valores">VALORES</h2>
            <?php echo nl2br(htmlspecialchars($valoresActuales, ENT_QUOTES, 'UTF-8')); ?>
        </div>
    </div>
    <a href="../index.php" class="fminvRegresar">REGRESAR</a>
    
    <div class="editar">
        <a href="editarValores.php" class="editarMision" id="editarMisionLink"">Editar Valores</a>
    </div>
    <script>
        document.getElementById('editarMisionLink').addEventListener('click', function(event) {
            if (!confirm('¿Estás seguro de que deseas editar los valores?')) {
                event.preventDefault(); // Evitar la navegación si el usuario cancela
            }
        });
    </script>
</body>
<?php include_once 'footer.php'; ?>
</html>
