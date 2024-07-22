<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="keywords" content="deposito, dental">
   <meta name="description" content="Sitio web para el manejo y control de inventario y ventas del Deposito Dental Hersan">
   <meta name="author" content="José Antonio López Silva">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="stylesheet" href="../estilos/normalize.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
   <link rel="shorcut icon" type="image/x-icon" href="../img/favicon.ico">
   <title>Nueva Categoría - DEPOSITO DENTAL HERSAN</title>
</head>

<body>
   <?php include 'header.php'; ?>
   <div class="body-modificar-foto">
      <h2>NUEVA CATEGORÍA</h2>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         require '../CONTROLADOR/registroCategoria.php';
      }
      ?>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
         <label for="Nombre">Nombre:</label>
         <input type="text" id="Nombre" name="Nombre" required>
         <br>

         <div class="formSubmit">
            <input type="submit" name="submit" class="submit" value="REGISTRAR CATEGORIA">
         </div>
         <div style="text-align: right; margin-top: 10px;">
            <a class="fminvRegresar" href="categorias.php">Regresar</a>
         </div>
      </form>
   </div>
</body>
<?php require_once 'footer.php'; ?>

</html>