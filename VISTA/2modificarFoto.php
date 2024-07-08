<?php
include_once '../CONTROLADOR/procesaModificarFoto.php';

// Obtener foto por ID si se ha enviado un formulario POST
$fotoID = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($fotoID > 0) {
    $foto = obtenerFotoPorID($fotoID);

    // Verificar si se pudo obtener la foto
    if (!$foto) {
        die("Foto no encontrada.");
    }
} else {
    $foto = null;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Foto</title>
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include_once 'header.php'; ?>

    <div class="body-modificar-foto">
        <h2>Modificar Fotografía</h2>
        <form action="../CONTROLADOR/procesaModificarFoto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($foto['FotoID'], ENT_QUOTES, 'UTF-8'); ?>">

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
