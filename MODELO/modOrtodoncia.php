<?php

include_once 'conexion.php';

class ModOrtodoncia
{
   private $conexion;

   public function __construct($conexion)
   {
      $this->conexion = $conexion;
   }

   public function getProductosOrtodoncia()
   {
      $consulta = "SELECT * FROM productos WHERE categoria = 'ortodoncia'";
      $sentencia = $this->conexion->prepare($consulta);
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getProductoPorId($idProducto)
   {
      $consulta = "SELECT * FROM productos WHERE IDProducto = :idProducto";
      $sentencia = $this->conexion->prepare($consulta);
      $sentencia->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
      $sentencia->execute();
      return $sentencia->fetch(PDO::FETCH_ASSOC);
   }

   public function actualizarProducto($idProducto, $nombre, $categoria, $descripcion, $stockMinimo, $cantidadStock)
   {
      $consulta = "UPDATE productos SET Nombre = :nombre, categoria = :categoria, Descripcion = :descripcion, StockMinimo = :stockMinimo, CantidadStock = :cantidadStock WHERE IDProducto = :idProducto";
      $sentencia = $this->conexion->prepare($consulta);
      $sentencia->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
      $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
      $sentencia->bindParam(':categoria', $categoria, PDO::PARAM_STR);
      $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
      $sentencia->bindParam(':stockMinimo', $stockMinimo, PDO::PARAM_INT);
      $sentencia->bindParam(':cantidadStock', $cantidadStock, PDO::PARAM_INT);
      return $sentencia->execute();
   }
}
