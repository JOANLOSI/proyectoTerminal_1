<?php
require_once 'conexion.php';
function verificarUsuarioRegistrado($nombre, $contrasena)
{
   global $conexion;

   try {
      // Preparando la consulta SQL
      $consulta = $conexion->prepare("SELECT nombre, categoria, contrasena FROM usuarios WHERE nombre = :nombre AND contrasena = :contrasena");

      // Ejecutar la consulta con el nombre y la contraseña como parámetros
      $consulta->execute(array(':nombre' => $nombre, ':contrasena' => $contrasena));

      // Obtener el resultado de la consulta
      $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

      // Verificar si se encontró algún resultado
      if ($resultado) {
         // Verificar la contraseña utilizando password_verify
         if (password_verify($contrasena, $resultado['contrasena'])) {
            // Contraseña válida, devolver el resultado (nombre y categoria)
            echo "¡Bienvenido, {$resultado['nombre']}! Tu categoría es: {$resultado['categoria']}";
            return $resultado;
         } else {
            echo 'Contraseña inválida';
            return false;
         }
      } else {
         //echo 'Usuario no encontrado';
         return false;
      }
   } catch (PDOException $e) {
      echo "Error al realizar la consulta: " . $e->getMessage();
      return false; // En caso de error, devolver falso
   }
}

function guardarUsuario($usuario, $nombre, $apellido, $email, $contrasena, $categoria)
{
    global $conexion;

    try {
        // Preparar la consulta para insertar el nuevo usuario
        $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, nombre, apellido, email, contrasena, categoria) VALUES (:usuario, :nombre, :apellido, :email, :contrasena, :categoria)");

        // Ejecutar la consulta con los valores proporcionados
        $consulta->execute(array(
            ':usuario' => $usuario,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':email' => $email,
            ':contrasena' => $contrasena,
            ':categoria' => $categoria
        ));

        // Mostrar mensaje de éxito o hacer alguna otra acción si es necesario
        // Por ejemplo:
         //echo "¡Usuario guardado con éxito!";
    } catch (PDOException $e) {
        // Manejar el error si la consulta falla
        echo "Error al guardar el usuario: " . $e->getMessage();
    }
}
