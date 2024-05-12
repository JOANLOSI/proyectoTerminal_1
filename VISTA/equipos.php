<?php
include '../CONTROLADOR/procesaEquipos.php'; 

$controladorEquipos = new ProcesaEquipos();

$resultado = $controladorEquipos->getProductosEquipos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EQUIPOS ODONTOLOGICOS</title>
   <link rel="stylesheet" href="../estilos/normalize.css">
   <link rel="stylesheet" href="../estilos/estilos.css">
</head>

<body>
   <?php include 'header.php'; ?>

   <div class="materiales">
      <h2 class="h2inventario">INVENTARIO DE EQUIPOS ODONTOLOGICOS</h2>
      <table class="tabla-inventario">
         <thead>
            <tr>
               <th>ID</th>
               <th>NOMBRE</th>
               <th>CATEGORIA</th>
               <th>DESCRIPCION</th>
               <th>STOCK MINIMO</th>
               <th>EXISTENCIA</th>
               <th>ACCIONES</th>
            </tr>
         </thead>

         <tbody>
            <?php
            if (isset($resultado)) {
               foreach ($resultado as $row) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row["IDProducto"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["Nombre"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["categoria"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["Descripcion"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["StockMinimo"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["CantidadStock"]) . "</td>";
                  echo "<td>";
                  echo "<a href='editarEquipos.php?id=" . htmlspecialchars($row['IDProducto']) . "&redirect=equipos.php' class='enlace-editar'>Editar</a> | ";
                  echo "<a href='../CONTROLADOR/borraEquipos.php?id=" . htmlspecialchars($row['IDProducto']) . "' class='enlace-eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>";
                  echo "</td>";
                  echo "</tr>";
               }
            } else {
               echo "<tr><td colspan='7'>No se encontraron productos</td></tr>";
            }
            ?>
         </tbody>
      </table>
   </div>

   <?php include 'footer.php'; ?>

</body>

</html>
