<?php
require_once 'conexion.php';

function obtenerCategorias()
{
   global $conexion;

   $sql = "SELECT CategoriaID, Nombre FROM categorias";
   $stmt = $conexion->query($sql);

   $categorias = [];
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $categorias[] = $row;
   }

   return $categorias;
}

function actualizarCategoria($id, $nuevoNombre)
{
   global $conexion;

   $sql = "UPDATE categorias SET Nombre = :nombre WHERE CategoriaID = :id";
   $stmt = $conexion->prepare($sql);
   $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);

   return $stmt->execute();
}
