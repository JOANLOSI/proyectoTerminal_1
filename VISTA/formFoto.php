<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulario Cargar Fotografía</title>
   <link rel="stylesheet" href="../estilos/normalize.css">
   <link rel="stylesheet" href="../estilos/estilos.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
      $(document).ready(function() {
         $.ajax({
            url: '../CONTROLADOR/procesaCargaFotos.php',
            method: 'GET',
            data: {
               action: 'getCategorias'
            },
            success: function(response) {
               const categorias = JSON.parse(response);
               let categoriaSelect = $('#categoria');
               categoriaSelect.append('<option value="">Selecciona una categoría</option>');
               categorias.forEach(function(categoria) {
                  categoriaSelect.append('<option value="' + categoria.Nombre + '">' + categoria.Nombre + '</option>');
               });
            },
            error: function() {
               alert('Error al cargar las categorías.');
            }
         });
      });
   </script>
</head>

<body>
   <?php include_once 'header.php'; ?>

   <h2 class="titulo">CARGAR FOTOGRAFÍA</h2>

   <div class="contenedor">
      <form class="formFoto" action="../CONTROLADOR/procesaCargaFotos.php" method="post" enctype="multipart/form-data">
         <label for="foto">Selecciona una fotografía</label>
         <input type="file" id="foto" name="foto" required>

         <label for="categoria">Categoria</label>
         <select id="categoria" name="categoria" required></select>

         <label for="titulo">Titulo de la Fotografía</label>
         <input type="text" id="titulo" name="titulo" required>

         <label for="texto">Descripción</label>
         <textarea name="texto" id="texto" placeholder="Descripción de la fotografía" required></textarea>

         <label for="fecha">Fecha de Carga</label>
         <input type="date" id="fecha" name="fecha" required>

         <div class="formSubmit">
            <input type="submit" class="submit" value="GUARDAR FOTOGRAFÍA">
         </div>
      </form>

      <a href="galeria.php" class="foto_regresa">REGRESAR</a>
      <?php include_once 'footer.php'; ?>
   </div>
</body>

</html>