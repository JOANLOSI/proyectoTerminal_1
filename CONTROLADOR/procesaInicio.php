<?php
require_once '../MODELO/modeloInicio.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verificar que los campos no estén vacíos
    if (empty($_POST['nombre']) || empty($_POST['contrasena'])) {
        // Si hay campos vacíos se redirige de vuelta al formulario de inicio con un mensaje de error
        header("Location: ../VISTA/inicio.php?error=Por favor complete los datos del formulario");
        echo "<script>
        setTimeout(function() {
            document.getElementById('nombre').value = '';
            document.getElementById('contrasena').value = '';
            document.getElementById('error-message').textContent = '';
        }, 5000);
      </script>";
        exit();
    } else { // Validar el formato del nombre con una expresión regular
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]{4,40}$/", $_POST['nombre'])) {
            // Si el nombre no cumple con el formato, redirigir de vuelta al formulario de inicio con un mensaje de error
            header("Location: ../VISTA/inicio.php?error=El formato del nombre es incorrecto, solo debe incluir minúsculas y mayúsculas, de 4 a 40 caracteres");
            echo "<script>
            setTimeout(function() {
                document.getElementById('nombre').value = '';
                document.getElementById('contrasena').value = '';
                document.getElementById('error-message').textContent = '';
            }, 5000);
        </script>";
            exit();
        }
        // Validar el formato de la contraseña con una expresión regular
        if (!preg_match("/^[a-zA-Z0-9#$%&\/()?¿]{4,50}$/", $_POST['contrasena'])) {
            // Si la contraseña no cumple con el formato, redirigir de vuelta al formulario de inicio con un mensaje de error
            header("Location: ../VISTA/inicio.php?error=El formato de la contraseña es incorrecto, debe incluir una letra minúscula, una mayúscula, un número y un carácter especial #$%&/()?¿. Debe ser de 4 a 50 caracteres");
            echo "<script>
            setTimeout(function() {
                document.getElementById('nombre').value = '';
                document.getElementById('contrasena').value = '';
                document.getElementById('error-message').textContent = '';
            }, 5000);
        </script>";
        exit();
        }
        // Aplicar sanitización para evitar la inyección de código HTML
        $nombre = trim($nombre);
        $nombre = htmlspecialchars($_POST['nombre']);
        $nombre = stripslashes($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

        $contrasena = trim($contrasena);
        $contrasena = htmlspecialchars($_POST['contrasena']);
        $contrasena = stripslashes($contrasena);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);

        // Verificar si el usuario está registrado
        $usuario = verificarUsuarioRegistrado($nombre, $contrasena); // Almacenar el resultado en $usuario
        if ($usuario) { // Verificar si la función devuelve un resultado
            echo "¡Bienvenido, $nombre! Ingresaste como {$usuario['categoria']}";
            header ("Location: ../VISTA/inventario.php");
        } else {
            header("Location: ../VISTA/inicio.php?error=Los datos proporcionados no están registrados, verifica la información");
            echo "<script>
            setTimeout(function() {
                document.getElementById('nombre').value = '';
                document.getElementById('contrasena').value = '';
                document.getElementById('error-message').textContent = '';
            }, 5000);
          </script>";
            exit();            
        }
    }
} else {
    // Si no se ha enviado el formulario de manera adecuada, redirigir de vuelta al formulario de inicio con un mensaje de error
    header("Location: inicio.php?error=metodo_invalido");
    exit();
}
?>