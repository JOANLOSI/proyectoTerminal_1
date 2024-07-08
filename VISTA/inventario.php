<?php
include '../MODELO/conexion.php';
include 'header.php';

// Definir la cantidad de registros por página
$registrosPorPagina = 5;

// Si se recibe el parámetro "pagina", se utiliza para el número de página actual
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Calcular el offset para la consulta SQL
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Realizar la consulta a la base de datos con LIMIT y OFFSET
$sql = "SELECT * FROM productos LIMIT :limit OFFSET :offset";
$stmt = $conexion->prepare($sql);
$stmt->bindValue(':limit', $registrosPorPagina, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener el número total de registros
$sqlTotal = "SELECT COUNT(*) AS total FROM productos";
$resultadoTotal = $conexion->query($sqlTotal);
$totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];

// Calcular el número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);
?>
<!DOCTYPE html>
<html lang="es">

<body>

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
            <?php if (count($resultado) > 0): ?>
                <?php foreach ($resultado as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['IDProducto']) ?></td>
                        <td><?= htmlspecialchars($row['Nombre']) ?></td>
                        <td><?= htmlspecialchars($row['categoria']) ?></td>
                        <td><?= htmlspecialchars($row['Descripcion']) ?></td>
                        <td><?= htmlspecialchars($row['StockMinimo']) ?></td>
                        <td><?= htmlspecialchars($row['CantidadStock']) ?></td>
                        <td>
                            <a href="formInventario.php?id=<?= htmlspecialchars($row['IDProducto']) ?>" class="enlace-editar">Editar</a> |
                            <a href="../CONTROLADOR/borraInventario.php?id=<?= htmlspecialchars($row['IDProducto']) ?>" class="enlace-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">No se encontraron productos</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="paginacion">
        <ul>
            <?php if ($paginaActual > 1): ?>
                <li><a href="?pagina=<?= $paginaActual - 1 ?>">Anterior</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($i == $paginaActual): ?>
                    <li class='pagina-actual'><?= $i ?></li>
                <?php else: ?>
                    <li><a href='?pagina=<?= $i ?>'><?= $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if ($paginaActual < $totalPaginas): ?>
                <li><a href='?pagina=<?= $paginaActual + 1 ?>'>Siguiente</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>