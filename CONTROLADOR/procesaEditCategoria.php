<?php
require '../MODELO/modEditCategoria.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $categoriaId = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
   $nuevoNombre = filter_input(INPUT_POST, 'nvoNombre', FILTER_SANITIZE_STRING);

   // Validar los datos
   if (!empty($categoriaId) && !empty($nuevoNombre)) {
      $resultado = actualizarCategoria($categoriaId, $nuevoNombre);

      if ($resultado) {
         echo "<script>alert('Nombre de la categoría actualizado correctamente.');
                  window.location.href = '../VISTA/editaCategoria.php';
                  </script>";
      } else {
         echo "<script>alert('Error al actualizar el nombre de la categoría.');
               window.location.href = '../VISTA/editaCategoria.php';
                  </script>";
      }
   } else {
      echo "<script>alert('Por favor, complete todos los campos.');
               window.location.href = '../VISTA/editaCategoria.php';
            </script>";
   }
}
