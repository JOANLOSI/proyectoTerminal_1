<?php
include_once '../MODELO/conexion.php';
include_once '../MODELO/modModificaFoto.php';
include_once 'header.php';

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
    $foto = obtenerFotosPorID($fotoID);
}

// Obtener categorías disponibles
$categorias = obtenerCategoria();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Fotografía</title>
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

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['CategoriaID']; ?>"><?php echo htmlspecialchars($categoria['Nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="imagenActual">Imagen Actual:</label>
            <img class="imgActual" src="<?php echo htmlspecialchars($foto['URLImagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?>">

            <label class="nueva" for="nuevaImagen">Seleccionar nueva imagen:</label>
            <input type="file" id="nuevaImagen" name="nuevaImagen" accept="image/*">

            <div class="formSubmit">
                <input type="submit" class="submit" value="GUARDAR CAMBIOS">
            </div>
        </form>
    </div>

    <a href="galeria.php" class="fminvRegresar">REGRESAR</a>

    <?php include_once 'footer.php'; ?>
</body>

</html>
