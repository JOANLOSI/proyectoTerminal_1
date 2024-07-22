<?php
include_once '../MODELO/conexion.php';
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
    $foto = obtenerFotoPorID($fotoID);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto</title>
    <script>
        function confirmarBorrado() {
            return confirm('¿Estás seguro de que deseas borrar esta imagen? Esta acción no se puede deshacer.');
        }

        function confirmarModificacion() {
            return confirm('¿Estás seguro de que deseas modificar los datos de esta fotografía?');
        }
    </script>
</head>

<body>
    <?php include_once 'header.php'; ?>

    <div class="body-foto">
        <div class="main-foto">
            <?php if ($foto) : ?>
                <!-- Verificar que la foto exista -->
                <h1><?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="foto-detalle">
                    <img src="<?php echo htmlspecialchars($foto['URLImagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['NombreFoto'], ENT_QUOTES, 'UTF-8'); ?>">
                    <p><?php echo htmlspecialchars($foto['Descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><small>Fecha de carga: <?php echo htmlspecialchars($foto['FechaCarga'], ENT_QUOTES, 'UTF-8'); ?></small></p>
                </div>
            <?php else : ?>
                <p>Foto no encontrada.</p>
            <?php endif; ?>
        </div>

        <aside class="derecho">
            <div class="aside">
                <!-- Formulario para borrar la imagen -->
                <form class="borrar" id="form-borrar" action="../CONTROLADOR/procesaBorrarFoto.php" method="post" onsubmit="return confirmarBorrado();">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($foto['FotoID'], ENT_QUOTES, 'UTF-8'); ?>">
                    <!-- Agregar campo oculto para confirmación -->
                    <input type="hidden" name="confirmacion" value="confirmado">
                    <button type="submit">Borrar Imagen</button>
                </form>

                <!-- Formulario para editar la imagen -->
                <form class="modificar" action="modificarFoto.php" method="post" onsubmit="return confirmarModificacion();">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($foto['FotoID'], ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit">Editar</button>
                </form>

                <!-- Formulario para crear una nueva imagen -->
                <form class="nueva" action="formFoto.php" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($fotoID, ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit">Nueva Imagen</button>
                </form>
            </div>
        </aside>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

</html>
