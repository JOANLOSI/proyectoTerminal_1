<?php
require '../MODELO/modBorraCategoria.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $categoriaId = filter_input(INPUT_POST, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);

   // Validar y asegurarse de que el ID de categoría no esté vacío
   if (!empty($categoriaId)) {
      // Llamar a la función para borrar la categoría
      $resultado = borrarCategoria($categoriaId);

      // Verificar el resultado y mostrar un mensaje
      if ($resultado) {
         echo "<script>alert('Categoría borrada correctamente.');</script>";
      } else {
         echo "<script>alert('Error al borrar la categoría.');</script>";
      }
   } else {
      echo "<script>alert('ID de categoría no válido.');</script>";
   }

   // Redirigir a la página de categorías después del borrado
   echo "<script>window.location.href = '../VISTA/categorias.php';</script>";
}
