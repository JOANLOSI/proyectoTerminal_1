<?php
require 'conexion.php';

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

function borrarCategoria($categoriaId)
{
   global $conexion;

   $sql = "DELETE FROM categorias WHERE CategoriaID = :categoria_id";
   $stmt = $conexion->prepare($sql);
   $stmt->bindParam(':categoria_id', $categoriaId, PDO::PARAM_INT);

   return $stmt->execute();
}
