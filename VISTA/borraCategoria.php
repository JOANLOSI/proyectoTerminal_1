<?php require_once 'header.php'; ?>

<body>
   <h2>BORRAR NOMBRE DE CATEGORÍA</h2>
   <div class="body-modificar-foto">
      <?php
      require '../MODELO/modBorraCategoria.php';

      // Obtener las categorías existentes
      $categorias = obtenerCategorias();

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         require '../CONTROLADOR/procesaBorraCategoria.php';
      }
      ?>

      <form action="../CONTROLADOR/procesaBorraCategoria.php" method="post" id="borrarCategoriaForm">
         <label for="categoria">Selecciona la categoría a borrar:</label>
         <select name="categoria_id" id="categoria" required>
            <?php foreach ($categorias as $categoria) : ?>
               <option value="<?php echo htmlspecialchars($categoria['CategoriaID']); ?>"><?php echo htmlspecialchars($categoria['Nombre']); ?></option>
            <?php endforeach; ?>
         </select>
         <br>
         <div class="formSubmit">
            <input type="submit" value="Borrar Categoría" class="submit" onclick="return confirmarBorrado();">
         </div>
         <div style="text-align: right; margin-top: 10px;">
            <a class="fminvRegresar" href="categorias.php" style="text-decoration: none; color: #333;">Regresar</a>
         </div>
      </form>

      <script>
         function confirmarBorrado() {
            return confirm('¿Estás seguro de que quieres borrar esta categoría? Esta acción no se puede deshacer.');
         }
      </script>

      <?php include 'footer.php'; ?>
   </div>
</body>