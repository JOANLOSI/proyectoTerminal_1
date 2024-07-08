<?php require_once 'header.php'; ?>

<body>
   <h2>EDITAR NOMBRE DE CATEGORIA</h2>

   <?php
   require '../MODELO/modEditCategoria.php';

   // Obtener las categorías existentes
   $categorias = obtenerCategorias();

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      require '../CONTROLADOR/procesaEditCategoria.php';
   }
   ?>

   <form action="../CONTROLADOR/procesaEditCategoria.php" method="post">
      <label for="categoria">Selecciona la categoría</label>
      <select name="categoria" id="categoria" required>
         <?php foreach ($categorias as $categoria) : ?>
            <option value="<?php echo htmlspecialchars($categoria['CategoriaID']); ?>"><?php echo htmlspecialchars($categoria['Nombre']); ?></option>
         <?php endforeach; ?>
      </select>
      <br>
      <label for="nvoNombre">Nuevo nombre de la categoría</label>
      <input type="text" name="nvoNombre" id="nvoNombre" placeholder="Nuevo nombre" required>
      <br>
      <input type="submit" value="CAMBIAR NOMBRE" class="inputRegCategoria">
      <br/>
      <div style="text-align: right; margin-top: 10px;">
        <a href="categorias.php" style="text-decoration: none; color: #333;">Regresar</a>
    </div>
   </form>
   <br/>
   <?php require_once 'footer.php'; ?>
</body>