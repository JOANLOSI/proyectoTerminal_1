<?php
include('../CONTROLADOR/procesaFoto.php');  // Incluye el archivo que procesa los datos de la foto
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Foto</title>
   
</head>

<body>
   <?php include_once 'header.php'; ?>

   <div class="body-foto">
   <div class="main-foto">
      <?php if ($foto) : ?> <!-- Verifica que la foto exista -->
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
         <div class="modificar">
         <h3><a href="modificarFoto.php">Editar</a></h3>
         </div>

         <div class="borrar">
            <h3><a href="borrarFoto.php">Borrar Imagen</a></h3>
         </div>

         <div class="nueva">
            <h3><a href="formFoto.php">Nueva Imagen</a></h3>
         </div>
      </div>
   </aside>
   </div>

   <a href="galeria.php" class="foto_regresa">REGRESAR</a>

   <?php include_once 'footer.php'; ?>
</body>

</html>