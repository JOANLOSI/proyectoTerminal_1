<?php
session_start();
include_once 'header.php'; 
include_once '../MODELO/conexion.php'; // Ajusta la ruta si es necesario

// Recuperar la misión actual
try {
    $query = "SELECT Mision FROM nosotros WHERE id = 1"; // Usar la columna `id` para identificar el registro
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $misionActual = $result ? htmlspecialchars($result['Mision'], ENT_QUOTES, 'UTF-8') : "Misión no encontrada";
} catch (PDOException $e) {
    $misionActual = "Error al recuperar la misión: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}

// Manejo de mensajes desde la sesión
$mensaje = '';
if (isset($_SESSION['mensaje'])) {
    $mensaje = htmlspecialchars($_SESSION['mensaje'], ENT_QUOTES, 'UTF-8');
    unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
}
?>


<body>
    <?php include_once 'header.php'; ?>
    <div class="container-mision">

        <img src="../img/marco4.svg" alt="Marco" class="marco">
        
        <div class="texto">
            <h2 class="mision">MISION</h2>
            <?php if ($mensaje): ?>
                <p><?php echo $mensaje; ?></p>
            <?php endif; ?>
            <p><?php echo $misionActual; ?></p>
        </div>
    </div>

    <a href="../index.php" class="fminvRegresar">REGRESAR</a>

    <div class="editar">
        <a href="editarMision.php" class="editarMision" id="editarMisionLink">Editar Misión</a>
    </div>

    <script>
        document.getElementById('editarMisionLink').addEventListener('click', function(event) {
            if (!confirm('¿Estás seguro de que deseas editar la misión?')) {
                event.preventDefault(); // Evitar la navegación si el usuario cancela
            }
        });
    </script>
</body>
<?php include_once 'footer.php'; ?>
</html>
