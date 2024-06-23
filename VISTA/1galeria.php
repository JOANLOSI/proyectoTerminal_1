<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Fotográfica</title>
    <style>
        .galeria {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .foto {
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
        }
        .foto img {
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Galería Fotográfica</h1>
    <div class="galeria">
        <?php if (!empty($fotos)): ?>
            <?php foreach ($fotos as $foto): ?>
                <div class="foto">
                    <img src="../uploads/<?php echo htmlspecialchars($foto['URLImagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?>">
                    <h2><?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><?php echo htmlspecialchars($foto['Descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><small><?php echo htmlspecialchars($foto['FechaCarga'], ENT_QUOTES, 'UTF-8'); ?></small></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay fotos disponibles.</p>
        <?php endif; ?>
    </div>
</body>
</html>