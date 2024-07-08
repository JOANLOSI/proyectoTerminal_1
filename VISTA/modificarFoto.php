<?php

// Inicializar variables
$fotoID = null;
$foto = null;

// Verificar si se envió un formulario POST con un ID de foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $fotoID = (int)$_POST['id'];
    include('../CONTROLADOR/procesaFoto.php');  // Incluir el archivo que procesa los datos de la foto
}

// Obtener la foto por ID
if ($fotoID) {
    $foto = obtenerFotoPorID($fotoID);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <?php include_once 'header.php'; ?>

    <div class="body-modificar-foto">
        <h2>Modificar Fotografía</h2>

        <form action="../CONTROLADOR/procesaModificarFoto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($foto['FotoID'], ENT_QUOTES, 'UTF-8'); ?>">

            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria" required></select>

            <label for="nombreFoto">Nombre de la Foto:</label>
            <input type="text" id="nombreFoto" name="nombreFoto" value="<?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?>" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($foto['Descripcion'], ENT_QUOTES, 'UTF-8'); ?></textarea>

            <label for="imagenActual">Imagen Actual:</label>
            <img class="imgActual" src="<?php echo htmlspecialchars($foto['URLImagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?>">

            <label class="nueva" for="nuevaImagen">Seleccionar nueva imagen:</label>
            <input type="file" id="nuevaImagen" name="nuevaImagen" accept="image/*">

            <div class="formSubmit">
                <input type="submit" class="submit" value="GUARDAR CAMBIOS">
            </div>
        </form>
    </div>

    <a href="galeria.php" class="foto_regresa">REGRESAR</a>

    <?php include_once 'footer.php'; ?>
</body>

</html>
</body>
</html>