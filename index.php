<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="deposito, dental">
    <meta name="descripton" content="Sitio web para el manejo y control de inventario y ventas del Deposito Dental Hersan">
    <meta name="author" content="José Antonio López Silva">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <!--<link rel="stylesheet" href="estilos/cssIndex.css">-->
    <link rel="shorcut icon" type="image/x-icon" href="img/favicon.ico">
    <title>DEPOSITO DENTAL HERSAN</title>
</head>

<body>
    <header class="pinicio">
        <section class="secheader">
            <img src="img/logo2.jpg" width="197" alt="Logo de la empresa">
        </section>
        
        <button class="abrir-menu" id="abrir"><i class="fa-solid fa-bars"></i></button>
        <nav class="nav" id="nav">
            
        <button class="cerrar" id="cerrar"><i class="fas fa-times"></i></button>
            <ul class="nav-list prinmenu">
                <li><a href="index.php">INICIO</a></li>
                <li id="categorias-menu">
                    <a href="#">CATEGORIAS</a>
                    <ul id="categorias-submenu" style="display: none;">
                        <li><a href="VISTA/nuevaCategoria.php">Nueva Categoría</a></li>
                        <li><a href="VISTA/editaCategoria.php">Editar</a></li>
                        <li><a href="VISTA/borraCategoria.php">Borrar Categoría</a></li>
                    </ul>
                </li>
                <li id="inventario-menu">
                    <a href="#">INVENTARIO</a>
                    <ul id="inventario-submenu" style="display: none;">
                        <li><a href="VISTA/inventario.php">Productos</a></li>
                        <li><a href="VISTA/formRegistroProducto.php">Registrar Producto</a></li>
                    </ul>
                </li>
                <li><a href="#">VENTAS</a></li>
                <li><a href="VISTA/galeria.php">GALERIA FOTOGRAFICA</a></li>
                <li><a href="#">PROVEEDORES</a></li>
                <li><a href="#">NOSOTROS</a></li>
                <li><a href="VISTA/inicio.php">COMENZAR</a></li>
                <li><a href="salir.php">SALIR</a></li>
            </ul>
        </nav>

    </header>
    <h1>DEPOSITO DENTAL HERSAN</h1>

    <section class="secbody">
        <img src="img/imagen_principal.jpg" width="1000" alt="imagen de inicio" title="instrumental" />
        <div class="centrado">Bienvenidos, esperamos cumplir sus espectativas<br> y confiamos que encuentres todo lo que buscas</div>
    </section>

    <footer>
        <section>
            <div><img src="img/smartphone (2).png" alt="Phone number">
                <p>33 3232 8769</p>
            </div>
            <div><img src="img/Email (2).png" alt="Email address">
                <p><a href="mailto:betyhernandezsandoval@gmail.com">betyhernandezsandoval@gmail.com</a></p>
            </div>
            <div><img src="img/ubicacion (2).png" alt="Address">
                <p>Av. San Mateo #717<br>Parques de Tesistan<br>C.P. 45200<br>Zapopan, Jal.</p>
            </div>
        </section>
    </footer>

    <script>
        // Obtener elementos del menú
        const categoriasMenu = document.getElementById('categorias-menu');
        const categoriasSubmenu = document.getElementById('categorias-submenu');
        const inventarioMenu = document.getElementById('inventario-menu');
        const inventarioSubmenu = document.getElementById('inventario-submenu');
        const nav = document.querySelector("#nav");
        const abrir = document.querySelector("#abrir");
        const cerrar = document.querySelector("#cerrar");

        abrir.addEventListener("click", () => {
            nav.classList.add("visible");
        });
        cerrar.addEventListener("click", () => {
            nav.classList.remove("visible");
        });

        // Agregar evento click al menú Categorías
        categoriasMenu.addEventListener('click', (event) => {
            // Alternar la visibilidad del submenu
            categoriasSubmenu.style.display = categoriasSubmenu.style.display === 'none' ? 'block' : 'none';

            // Verificar si el click fue en el enlace principal de "Categorías"
            if (event.target.tagName === 'A' && event.target.parentElement === categoriasMenu) {
                event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
                setTimeout(() => {
                    window.location.href = "VISTA/categorias.php";
                }, 3000); // Retrasar la redirección para permitir la visualización del submenú
            }
        });

        // Agregar evento click al menú Inventario
        inventarioMenu.addEventListener('click', () => {
            // Alternar la visibilidad del submenu
            inventarioSubmenu.style.display = inventarioSubmenu.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>

</html>