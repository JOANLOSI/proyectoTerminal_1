<?php
   $servidor = "localhost";
   $usuario = "id20254554_joanlosi";
   $password = "Jals100760#";
   
   try {
      // Conexión a la base de datos
         $conexion = new PDO("mysql:host=$servidor;dbname=id20254554_depositodentalhersan", $usuario, $password);
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "Conexión realizada con exito";
      }
      catch (PDOException $e) {
         echo "La conexión falló: " . $e->getMessage();
         exit();
      }

      ?>
