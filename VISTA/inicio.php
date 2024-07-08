<!DOCTYPE html>
<html lang="es">

<body>

   <?php
   include 'header.php';
   ?>

<h2>INICIAR SESIÓN</h2>
   <div class="formReg">

      <form action="../CONTROLADOR/procesaInicio.php" method="post" name="" id="formulario" class="registro">

         <div>
            <label for="nombre">NOMBRE:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre: "><br />
         </div>

         <div>
            <label for="contrasena">CONTRASEÑA:</label>
            <input type="password" name="contrasena" id="contrasena" placeholder="Password: "><br />
         </div>

         <!-- Aquí se mostrarán los mensajes de error -->
         <div class="error-message" id="errores">
            <?php
            // Se muestranr mensajes de error generados previamente si los hay
            if (isset($_GET['error'])) {
               echo "<p>{$_GET['error']}</p>";
            }
            ?>
         </div>
         <br />

         <div class="submit">
         <input type="submit" name="submit" value="INGRESAR">
         </div>

      </form>

      <p class="register-text">¿No tienes cuenta? <a href="registro.php"><b>Regístrate</b></a></p>

   </div>

   <?php
include 'footer.php';
?>

<script>
      // Función para eliminar el mensaje de error después de 3 segundos
      function eliminarMensajeError() {
         var errorMessage = document.getElementById('errores'); // Selecciona el elemento del mensaje de error
         if (errorMessage) {
            setTimeout(function() {
               errorMessage.innerHTML = ''; // Elimina el contenido del elemento después de 3 segundos
            }, 5000);
         }
      }

      // Llama a la función para eliminar el mensaje de error
      eliminarMensajeError();
   </script>

   <!--<script src="../js/formulario.js"></script>-->
   <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>