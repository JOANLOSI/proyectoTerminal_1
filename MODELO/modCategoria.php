<?php
include_once 'conexion.php';  // Incluir el archivo de conexión

// Función para obtener todas las categorías
function obtenerCategorias()
{
   global $conexion;

   try {
      $sql = "SELECT CategoriaID, Nombre FROM categorias";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
      error_log("Error al obtener las categorías: " . $e->getMessage());
      return false;
   }
}

// Otras funciones relacionadas con las categorías según necesites
