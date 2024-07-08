<!DOCTYPE html>
<html lang="es">

<body>

   <?php
   include 'header.php';
   ?>

   <h2>REGISTRO DE USUARIO</h2>
   <div class="formReg">

      <form action="../CONTROLADOR/procesaRegistro.php" method="post" name="" id="formulario" class="registro">

         <div>
            <label for="usuario">USUARIO</label>
            <input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario">
         </div>

         <div>
            <label for="nombre">NOMBRE:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre: ">
         </div>

         <div>
            <label for="apellido">APELLIDO:</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido: ">
         </div>

         <div>
            <label for="email">EMAIL:</label>
            <input type="email" name="email" id="email" placeholder="Email: ">
         </div>

         <div>
            <label for="contrasena">CONTRASEÑA:</label>
            <input type="password" name="contrasena" id="contrasena" placeholder="Password: "><br />
         </div>

         <div>
            <label for="contrasena2">CONFIRMA CONTRASEÑA:</label>
            <input type="password" name="contrasena2" id="contrasena2" placeholder="Password: "><br />
         </div>

         <div>
            <label for="categoria">CATEGORIA:</label>
            <input type="text" name="categoria" id="categoria" placeholder="Categoria: ">
         </div>

         <!-- Aquí se mostrarán los mensajes de error -->
         <div class="error" id="error">
            <?php
            // Se muestranr mensajes de error generados previamente si los hay
            if (isset($_GET['error'])) {
               echo "<p class='error-message'>{$_GET['error']}</p>";
            }
            ?>
         </div>
         <br />

         <div class="submit">
            <input type="submit" name="submit" value="REGISTRAR">
         </div>

      </form>

      <p class="register-text">¿Ya tienes una cuenta? <a href="inicio.php"><b>Inicio de Sesión</b></a></p>

   </div>
   <!-- Script para limpiar campos después de 4 segundos -->
   <script>
        setTimeout(function() {
            document.getElementById("error").innerHTML = ""; // Limpiar mensaje de error
        }, 5000);
    </script>

   <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>

<?php
include 'footer.php';
?>

</html>