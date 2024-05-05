<?php
include '../MODELO/conexion.php';

// Definir la cantidad de registros por página
$registrosPorPagina = 5;

// Si se recibe el parámetro "pagina", se utiliza para el número de página actual
if (isset($_GET['pagina'])) {
   $paginaActual = $_GET['pagina'];
} else {
   $paginaActual = 1; // Página inicial por defecto
}

// Calcular el offset para la consulta SQL
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Realizar la consulta a la base de datos con LIMIT y OFFSET
$sql = "SELECT * FROM productos LIMIT $registrosPorPagina OFFSET $offset";
$resultado = $conexion->query($sql);

// Obtener el número total de registros
$sqlTotal = "SELECT COUNT(*) AS total FROM productos";
$resultadoTotal = $conexion->query($sqlTotal);
$rowTotal = $resultadoTotal->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $rowTotal['total'];

// Calcular el número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Categoría de Artículos</title>
   <link rel="stylesheet" href="../estilos/normalize.css">
   <link rel="stylesheet" href="../estilos/estilos.css">
</head>

<body>
   <?php include 'header.php'; ?>

   <div class="materiales">
      <h2 class="h2inventario">INVENTARIO</h2>
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
            if ($resultado->rowCount() > 0) {
               while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row["IDProducto"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["Nombre"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["categoria"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["Descripcion"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["StockMinimo"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["CantidadStock"]) . "</td>";
                  echo "<td>";
                  echo "<a href='formInventario.php?id=" . htmlspecialchars($row['IDProducto']) . "' class='enlace-editar'>Editar</a> | ";
                  echo "<a href='../CONTROLADOR/borraInventario.php?id=" . htmlspecialchars($row['IDProducto']) . "' class='enlace-eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>Eliminar</a>";
                  echo "</td>";
                  echo "</tr>";
               }
            } else {
               echo "<tr><td colspan='7'>No se encontraron productos</td></tr>";
            }
            ?>
         </tbody>
      </table>

      <div class="paginacion">
         <ul>
            <?php
            if ($paginaActual > 1) {
               echo "<li><a href='?pagina=" . ($paginaActual - 1) . "'>Anterior</a></li>";
            }

            for ($i = 1; $i <= $totalPaginas; $i++) {
               if ($i == $paginaActual) {
                  echo "<li class='pagina-actual'>$i</li>";
               } else {
                  echo "<li><a href='?pagina=$i'>$i</a></li>";
               }
            }

            if ($paginaActual < $totalPaginas) {
               echo "<li><a href='?pagina=" . ($paginaActual + 1) . "'>Siguiente</a></li>";
            }
            ?>
         </ul>
      </div>
   </div>

   <?php include 'footer.php'; ?>

</body>

</html