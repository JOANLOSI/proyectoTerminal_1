<?php
require_once 'conexion.php';

function verificarUsuarioRegistrado($nombre, $contrasena)
{
   global $conexion;

   try {
      // Preparar la consulta SQL
      $consulta = $conexion->prepare("SELECT nombre, contrasena, categoria FROM usuarios WHERE nombre = :nombre");

      // Ejecutar la consulta con el nombre como parámetros
      $consulta->execute(array(':nombre' => $nombre));

      // Obtener el resultado de la consulta
      $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

      // Verificar si se encontró algún resultado
      if ($resultado) {
         //revisar la contraseña utilizando password_verify
         if (password_verify($contrasena, $resultado['contrasena'])) {
            //devuelve el resultado nombre y categoria
         return $resultado;
      } else {
         return false; // Usuario no encontrado
      }
   } else {
      // Usuario no encontrado
      return false;
   }
   } catch (PDOException $e) {
      echo "Error al realizar la consulta: " . $e->getMessage();
      return false; // En caso de error, devolver falso
   }
}
?>