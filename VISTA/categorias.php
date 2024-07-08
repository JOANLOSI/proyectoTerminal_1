<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Categoría de Artículos</title>
   <link rel="stylesheet" href="../estilos/estilos.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="../estilos/font-awesome.min.css">
   <link rel="shorcut icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>

   <?php
   include 'header.php';
   ?>

   <h2 class="h_categoria">CATEGORIA DE ARTÍCULOS</h2>

   <div class="categoria_container">
      <div class="categoria">
         <a href="#endodoncia.php">
            <img class="imgCategoria" src="../img/img_categorias/Endodoncia_ozkan-guner-1nJzcrGGktY-unsplash.jpg" alt="Endodoncia">
            <a href="endodoncia.php" class="textoCentrado">ENDODONCIA</a>
         </a>
      </div>

      <div class="categoria">
         <a href="">
            <img class="imgCategoria" src="../img/img_categorias/ortodoncia_diana-polekhina-fmB7IdFjhTM-unsplash.jpg" alt="Ortodoncia">
            <a href="ortodoncia.php" class="textoCentrado">ORTODONCIA</a>
         </a>
      </div>

      <div class="categoria">
         <a href="">
            <img class="imgCategoria" src="../img/img_categorias/instrumental_caroline-lm-1lbvRjeF2JE-unsplash.jpg" alt="Instrumental">
            <a href="instrumental.php" class="textoCentrado">INSTRUMENTAL</a>
         </a>
      </div>

      <div class="categoria">
         <a href="">
            <img class="imgCategoria" src="../img/img_categorias/equipo_engin-akyurt-WQ5fGfFHGZ0-unsplash.jpg" alt="Equipos">
            <a href="equipos.php" class="textoCentrado">EQUIPOS</a>
         </a>
      </div>

      <div class="categoria">
         <a href="">
            <img class="imgCategoria" src="../img/img_categorias/otros_material_the-humble-co-cADflhZzgyo-unsplash.jpg" alt="Otros, Diversos">
            <a href="diversos.php" class="textoCentrado">DIVERSOS</a>
         </a>
      </div>
   </div>

   <!--MENU INFERIOR-->
   <!--<button class="abrir-menuInferior" id="abrir"><i class="fa-solid fa-bars"></i></button>-->
   <nav class="nav" id="nav">

      <!--<button class="cerrar" id="cerrar"><i class="fas fa-times"></i></button>-->
      <ul class="nav-list prinmenu">
         <li><a href="endodoncia.php">ENDODONCIA</a></li>
         <li><a href="ortodoncia.php">ORTODONCIA</a></li>
         <li><a href="instrumental.php">INSTRUMENTAL</a></li>
         <li><a href="equipos.php">EQUIPOS</a></li>
         <li><a href="diversos.php">DIVERSOS</a></li>
         <li><a href="nuevaCategoria.php">NUEVA CATEGORÍA</a></li>
      </ul>
   </nav>

   <?php
   include 'footer.php';
   ?>
   