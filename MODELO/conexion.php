<?php
   $servidor = "localhost";
   $usuario = "root";
   $password = "";
   
   try {
      // Conexión a la base de datos
         $conexion = new PDO("mysql:host=$servidor;dbname=depositodentalhersan", $usuario, $password);
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "Conexión realizada con exito";
      }
      catch (PDOException $e) {
         echo "La conexión falló: " . $e->getMessage();
         exit();
      }

      ?>
