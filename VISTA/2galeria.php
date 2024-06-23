<?php
include_once '../CONTROLADOR/procesaGaleria.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotografías</title>
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include_once 'header.php'; 
    $message = '';
    $pagina = '';
    ?>
    <h1 class="titulo">GALERÍA DE FOTOGRAFÍAS</h1>

    <div class="contenedor">
        <?php if ($message): ?>
            <p class="error"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <div class="galeria">
            <?php if (!empty($fotos)): ?>
                <?php foreach ($fotos as $foto): ?>
                    <div class="foto">
                        <img src="<?php echo htmlspecialchars($foto['URLImagen']); ?>" alt="<?php echo htmlspecialchars($foto['NombreFoto']); ?>">
                        <h2><?php echo htmlspecialchars($foto['NombreFoto']); ?></h2>
                        <p><?php echo htmlspecialchars($foto['Descripcion']); ?></p>
                        <small><?php echo htmlspecialchars($foto['FechaCarga']); ?></small>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay fotos disponibles.</p>
            <?php endif; ?>
        </div>

        <div class="paginacion">
            <?php if ($pagina > 1): ?>
                <a href="procesaGaleria.php?pagina=<?php echo $pagina - 1; ?>" class="btn">Anterior</a>
            <?php endif; ?>
            <a href="procesaGaleria.php?pagina=<?php echo $pagina + 1; ?>" class="btn">Siguiente</a>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>