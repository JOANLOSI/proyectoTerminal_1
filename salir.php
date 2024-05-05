<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redireccionar al usuario a la página "index.php"
header("Location: index.php");
exit(); // Asegurar que el script se detenga después de la redirección
?>