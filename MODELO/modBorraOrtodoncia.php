<?php
include 'conexion.php';

class BorrarOrtodoncia
{
   public function borrarProducto($idProducto)
   {
      global $conexion;

      try {
         // Verificar si el producto existe
         $sql_check = "SELECT COUNT(*) FROM productos WHERE IDProducto = :id";
         $stmt_check = $conexion->prepare($sql_check);
         $stmt_check->bindParam(':id', $idProducto, PDO::PARAM_INT);
         $stmt_check->execute();
         $producto_existente = $stmt_check->fetchColumn();

         if ($producto_existente) {
            // Eliminar el producto
            $sql_delete = "DELETE FROM productos WHERE IDProducto = :id";
            $stmt_delete = $conexion->prepare($sql_delete);
            $stmt_delete->bindParam(':id', $idProducto, PDO::PARAM_INT);
            $stmt_delete->execute();
         } else {
            echo "El producto no existe";
         }
      } catch (PDOException $e) {
         echo "Error: " . $e->getMessage();
      }
   }
}
