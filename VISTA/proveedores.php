<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores</title>
    <script>
        function confirmarEdicion(id) {
            if (confirm("¿Estás seguro de que deseas editar este proveedor?")) {
                window.location.href = 'editarProveedor.php?id=' + id;
            }
        }

        function confirmarBorrado(id) {
            if (confirm("¿Estás seguro de que deseas borrar este proveedor?")) {
                window.location.href = '../CONTROLADOR/borrarProveedor.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <?php 
    require_once('../MODELO/conexion.php');
    require_once('../MODELO/modListaProveedores.php');
    require_once('header.php');

    // Número de proveedores por página
    $proveedoresPorPagina = 4;

    // Obtener el número de página actual desde la URL, si no está presente se establece en 1
    $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

    // Calcular el inicio para la consulta
    $inicio = ($paginaActual - 1) * $proveedoresPorPagina;

    // Obtener proveedores desde el modelo con paginación
    $proveedores = obtenerProveedoresPaginados($conexion, $inicio, $proveedoresPorPagina);

    // Obtener el número total de proveedores
    $totalProveedores = contarProveedores($conexion);

    // Calcular el número total de páginas
    $totalPaginas = ceil($totalProveedores / $proveedoresPorPagina);
    ?>

    <h2>Listado de Proveedores</h2>
    <?php 
    // Mostrar proveedores en divs alineados dos por fila
    if ($proveedores && count($proveedores) > 0): ?>
        <?php foreach ($proveedores as $index => $proveedor): ?>
            <div class="proveedor">
                <h3><?php echo htmlspecialchars($proveedor['Nombre']); ?></h3>
                <p><strong>Dirección:</strong> <?php echo htmlspecialchars($proveedor['Direccion']); ?></p>
                <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($proveedor['Telefono']); ?></p>
                <p class="email"><strong>Email:</strong> <?php echo htmlspecialchars($proveedor['Email']); ?></p>
                <div class="acciones">
                    <a href="javascript:void(0);" onclick="confirmarEdicion(<?php echo $proveedor['ProveedorID']; ?>)"><i class="fas fa-edit"></i><span>Editar Registro</span></a>
                    <a href="javascript:void(0);" onclick="confirmarBorrado(<?php echo $proveedor['ProveedorID']; ?>)"><i class="fas fa-trash"></i><span>Borrar Registro</span></a>
                </div>
            </div>
            <?php if (($index + 1) % 2 == 0): ?>
                <div class="clear"></div> <!-- Limpia después de dos elementos -->
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron proveedores.</p>
    <?php endif; ?>

    <!-- Paginación -->
    <div class="paginacion">
        <?php if ($paginaActual > 1): ?>
            <a href="?pagina=<?php echo $paginaActual - 1; ?>">Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="?pagina=<?php echo $i; ?>" <?php if ($i == $paginaActual) echo 'class="active"'; ?>>
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($paginaActual < $totalPaginas): ?>
            <a href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
        <?php endif; ?>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
