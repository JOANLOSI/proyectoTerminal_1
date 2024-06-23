<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   
   <title>Formulario Cargar Fotografia</title>
   <link rel="stylesheet" href="../estilos/normalize.css">
   <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
   <?php include_once 'header.php'; ?>

         <h1 class="titulo">CARGAR FOTOGRAFÍA</h1>

   <div class="contenedor">
      <form  class="formFoto" action="../CONTROLADOR/procesaCargaFotos.php" method="post" enctype="multipart/form-data">

         <label for="foto">Selecciona una fotografía</label>
         <input type="file" id="foto" name="foto">

         <label for="categoria">Categoria</label>
         <input type="text" id="categoria" name="categoria">

         <label for="titulo">Titulo de la Fotografía</label>
         <input type="text" id="titulo" name="titulo">

         <label for="texto">Descripción</label>
         <textarea name="texto" id="texto" placeholder="Descripción de la fotografía"></textarea>

         <label for="fecha">Fecha de Carga</label>
         <input type="date" id="fecha" name="fecha">

         <div class="formSubmit">
         <input type="submit" class="submit" value="GUARDAR FOTOGRAFÍA">
         </div>

      </form>

      <?php include_once 'footer.php'; ?>
   </div>
