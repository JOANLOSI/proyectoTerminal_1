<?php
include('../CONTROLADOR/procesaGaleria.php');  // Incluye el archivo que procesa los datos de la galería
?>

<body>
    <?php include_once 'header.php'; ?>

    <h1>Galería Fotográfica</h1>
    <div class="galeria">
        <?php foreach ($galeria as $foto): ?>  <!-- Itera sobre las fotos de la galería -->
            <div class="foto">
                <h2><?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?></h2>  <!-- Escapar HTML -->
                <a href="foto.php?id=<?php echo htmlspecialchars($foto['FotoID'], ENT_QUOTES, 'UTF-8'); ?>">
                    <img src="<?php echo htmlspecialchars($foto['URLImagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?>">
                </a>
                <p><?php echo htmlspecialchars($foto['Descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p><small>Fecha de carga: <?php echo htmlspecialchars($foto['FechaCarga'], ENT_QUOTES, 'UTF-8'); ?></small></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="paginacion">
        <!-- Navegación de paginación -->
        <?php if ($pagina > 1): ?>
            <a href="galeria.php?pagina=<?php echo $pagina - 1; ?>" class="btn"><i class="fa-solid fa-circle-arrow-left"></i> Anterior</a>
        <?php endif; ?>
        <?php if ($pagina < $totalPaginas): ?>
            <a href="galeria.php?pagina=<?php echo $pagina + 1; ?>" class="btn">Siguiente <i class="fa-solid fa-circle-arrow-right"></i></a>
        <?php endif; ?>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>