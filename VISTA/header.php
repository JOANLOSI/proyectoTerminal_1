<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="deposito, dental">
    <meta name="descripton" content="Sitio web para el manejo y control de inventario y ventas del Deposito Dental Hersan">
    <meta name="author" content="José Antonio López Silva">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    <link rel="shorcurt icon" type="image/x-icon" href="../img/favicon.ico">
    <title>INICIO</title>
</head>

<body>
    <header class="pinicio">
        <section class="secheader">
            <img src="../img/logo2.jpg" width="197" alt="">
        </section>

        <ul class="prinmenu">
    <li><a href="../index.php">INICIO</a></li>
    <li><a href="categorias.php">CATEGORIAS</a></li>
    <li id="inventario-menu">
        <a href="#">INVENTARIO</a>
        <ul id="inventario-submenu" style="display: none;">
            <li><a href="../VISTA/inventario.php">Productos</a></li>
            <li><a href="../VISTA/formRegistroProducto.php">Registrar Producto</a></li>
        </ul>
    </li>
    <li><a href="#">VENTAS</a></li>
    <li><a href="#">GALERIA FOTOGRAFICA</a></li>
    <li><a href="#">PROVEEDORES</a></li>
    <li><a href="#">NOSOTROS</a></li>
    <li><a href="inicio.php">COMENZAR</a></li>
    <li><a href="../salir.php">SALIR</a></li>            
</ul>
    </header>

    <script>
    // Obtener elementos del menú
    const inventarioMenu = document.getElementById('inventario-menu');
    const inventarioSubmenu = document.getElementById('inventario-submenu');

    // Agregar evento click al menú Inventario
    inventarioMenu.addEventListener('click', () => {
        // Alternar la visualización del submenú
        inventarioSubmenu.style.display = inventarioSubmenu.style.display === 'none' ? 'block' : 'none';
    });
</script>
</body>

</html>

