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
   <link rel="shorcut icon" type="image/x-icon" href="../img/favicon.ico">
   <title>DEPOSITO DENTAL HERSAN</title>
</head>

<body>
   <header class="pinicio">
      <section class="secheader">
         <img src="../img/logo2.jpg" width="197" alt="Logo de la empresa">
      </section>
      <button class="abrir-menu" id="abrir"><i class="fa-solid fa-bars"></i></button>
      <nav class="nav" id="nav">
         <button class="cerrar" id="cerrar"><i class="fas fa-times"></i></button>
         <ul class="nav-list prinmenu">
            <li><a href="../index.php">INICIO</a></li>

            <li id="categorias-menu">
               <a href="#">CATEGORIAS</a>
               <ul id="categorias-submenu" style="display: none;">
                  <li><a href="nuevaCategoria.php">Nueva Categoría</a></li>
                  <li><a href="editaCategoria.php">Editar</a></li>
                  <li><a href="borraCategoria.php">Borrar Categoría</a></li>
               </ul>
            </li>

            <li id="inventario-menu">
               <a href="#">INVENTARIO</a>
               <ul id="inventario-submenu" style="display: none;">
                  <li><a href="inventario.php">Productos</a></li>
                  <li><a href="formRegistroProducto.php">Registrar Producto</a></li>
               </ul>
            </li>

            <li><a href="#">VENTAS</a></li>
            <li><a href="galeria.php">GALERIA FOTOGRAFICA</a></li>

            <li id="proveedoresMenu">
               <a href="#">PROVEEDORES</a>
               <ul id="proveedoresSubmenu" style="display: none;">
                  <li><a href="nuevoProveedor.php">Nuevo Proveedor</a></li>
               </ul>
            </li>

            <li id="nosotrosMenu">
               <a href="#">NOSOTROS</a>
               <ul id="nosotrosSubmenu" style="display: none;">
                  <li><a href="mision.php">Mision</a></li>
                  <li><a href="vision.php">Vision</a></li>
                  <li><a href="valores.php">Valores</a></li>
               </ul>
            </li>

            <li><a href="inicio.php">COMENZAR</a></li>

            <li><a href="../salir.php">SALIR</a></li>
         </ul>
      </nav>
   </header>
   <h1>DEPOSITO DENTAL HERSAN</h1>

   <script>
      // Obtener elementos del menú
      const categoriasMenu = document.getElementById('categorias-menu');
      const categoriasSubmenu = document.getElementById('categorias-submenu');

      const inventarioMenu = document.getElementById('inventario-menu');
      const inventarioSubmenu = document.getElementById('inventario-submenu');

      const proveedoresMenu = document.getElementById('proveedoresMenu');
      const proveedoresSubmenu = document.getElementById('proveedoresSubmenu');

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
               window.location.href = "categorias.php";
            }, 3000); // Retrasar la redirección para permitir la visualización del submenú
         }
      });

      // Agregar evento click al menú Inventario
      inventarioMenu.addEventListener('click', () => {
         // Alternar la visibilidad del submenu
         inventarioSubmenu.style.display = inventarioSubmenu.style.display === 'none' ? 'block' : 'none';
      });

      //Agregar evento click al menu Proveedores
      proveedoresMenu.addEventListener('click', (event) => {
         // Alternar la visibilidad del submenu
         proveedoresSubmenu.style.display = proveedoresSubmenu.style.display === 'none' ? 'block' : 'none';

         // Verificar si el click fue en el enlace principal de "Proveedores"
         if (event.target.tagName === 'A' && event.target.parentElement === proveedoresMenu) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
            setTimeout(() => {
               window.location.href = "proveedores.php";
            }, 2000); // Retrasar la redirección para permitir la visualización del submenú
         }
      });
      // Asegurar que los enlaces dentro del submenú "Proveedores" funcionen correctamente
      proveedoresSubmenu.addEventListener('click', (event) => {
         event.stopPropagation(); // Prevenir que el click se propague al menú principal
      });

      //Agregar evento click al menu Nosotros
      nosotrosMenu.addEventListener('click', (event) => {
            // Alternar la visibilidad del submenu
            nosotrosSubmenu.style.display = nosotrosSubmenu.style.display === 'none' ? 'block' : 'none';

            // Verificar si el click fue en el enlace principal de "Nosotros"
            /*if (event.target.tagName === 'A' && event.target.parentElement === nosotrosMenu) {
                event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
                setTimeout(() => {
                    window.location.href = "VISTA/proveedores.php";
                }, 2000); // Retrasar la redirección para permitir la visualización del submenú
            }*/
        });

        // Asegurar que los enlaces dentro del submenú "Nosotros" funcionen correctamente
        nosotroSubmenu.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevenir que el click se propague al menú principal
        });
   </script>
</body>

</html>