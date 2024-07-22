<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Registro de Nuevo Proveedor</title>
   <script>
      // Función para mostrar mensaje de éxito
      function mostrarMensajeExito(mensaje) {
         alert(mensaje);
         window.location.href = 'nuevoProveedor.php';
      }
   </script>
</head>

<body>

   <?php include 'header.php'; ?>

   <h2>REGISTRO DE NUEVO PROVEEDOR</h2>
   <div class="body-modificar-foto">
      <form action="../CONTROLADOR/procesaNuevoProveedor.php" method="post" id="formulario" class="registro">
         <div>
            <label for="nombre">NOMBRE:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre: " required><br />
         </div>

         <div>
            <label for="direccion">DIRECCIÓN:</label>
            <input type="text" name="direccion" id="direccion" placeholder="Dirección: " required><br />
         </div>

         <div>
            <label for="telefono">TELEFONO:</label>
            <input type="tel" name="telefono" id="telefono" placeholder="Teléfono: " pattern="[0-9]{10}" required><br />
         </div>

         <div>
            <label for="email">EMAIL:</label>
            <input type="email" name="email" id="email" placeholder="Correo Electrónico: " required><br />
         </div>

         <!-- Aquí se mostrarán los mensajes de error -->
         <div class="error-message" id="errores">
            <?php
            // Mostrar mensajes de error generados previamente si los hay
            if (isset($_GET['error'])) {
               echo "<p>{$_GET['error']}</p>";
            }
            ?>
         </div>
         <br />

         <div class="formSubmit">
            <input type="submit" class="submit" name="submit" value="Registrar">
         </div>
      </form>

      <a href="proveedores.php" class="fminvRegresar">REGRESAR</a>

      <?php include_once 'footer.php'; ?>

      <?php
      // Mostrar mensaje de éxito si existe
      if (isset($_GET['mensaje'])) {
         echo "<script>mostrarMensajeExito('{$_GET['mensaje']}');</script>";
      }
      ?>
   </div>
</body>

</html>