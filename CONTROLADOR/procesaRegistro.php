<?php
require_once '../MODELO/modeloRegistro.php';

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
$contrasena2 = isset($_POST['contrasena2']) ? $_POST['contrasena2'] : '';
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';

// Función JavaScript para limpiar campos
echo '<script>
    function limpiarCampos() {
        setTimeout(function() {
            document.getElementById("usuario").value = "";
            document.getElementById("nombre").value = "";
            document.getElementById("apellido").value = "";
            document.getElementById("email").value = "";
            document.getElementById("contrasena").value = "";
            document.getElementById("contrasena2").value = "";
            document.getElementById("categoria").value = "";
            document.getElementById("error").innerHTML = "";
        }, 500);
    }
        setTimeout(limpiarCampos, 5000); // Limpiar campos y mensaje de error después de 4 segundos
</script>';

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar datos del formulario
    $usuario = isset($_POST['usuario']) ? trim(htmlspecialchars(stripslashes($_POST['usuario']))) : '';
    $nombre = isset($_POST['nombre']) ? trim(htmlspecialchars(stripslashes($_POST['nombre']))) : '';
    $apellido = isset($_POST['apellido']) ? trim(htmlspecialchars(stripslashes($_POST['apellido']))) : '';
    $email = isset($_POST['email']) ? trim(htmlspecialchars(stripslashes($_POST['email']))) : '';
    $contrasena = isset($_POST['contrasena']) ? trim(htmlspecialchars(stripslashes($_POST['contrasena']))) : '';
    $contrasena2 = isset($_POST['contrasena2']) ? trim(htmlspecialchars(stripslashes($_POST['contrasena2']))) : '';
    $categoria = isset($_POST['categoria']) ? trim(htmlspecialchars(stripslashes($_POST['categoria']))) : '';

    //verificar que los campos no esten vacios
    if (empty($_POST['usuario']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email']) || empty($_POST['contrasena']) || empty($_POST['contrasena2']) || empty($_POST['categoria'])) {
        //Si hay campos vacios se redirige al formulario de registro con un mensaje de error
        header("Location: ../VISTA/registro.php?error=Todos los campos del formulario son obligatorios");
        echo '<script>
        setTimeout(function() {
            limpiarCampos();
        }, 4000);
    </script>';
        exit();
    } else { // Validar el formato del usuario con una expresión regular
        if (!preg_match("/^[a-zA-Z0-9\s\-_]{4,20}$/", $_POST['usuario'])) {
            // Si el usuario no cumple con el formato, redirigir de vuelta al formulario de registro con un mensaje de error
            header("Location: ../VISTA/registro.php?error=El formato del usuario es incorrecto, solo debe incluir minúsculas, mayúsculas, números, -, _ y espacios. Debe tener de 4 a 40 caracteres");
            echo '<script>
        limpiarCampos();
        </script>';
            exit();
        }
    }

    // Validar el formato del nombre con una expresión regular
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]{4,40}$/", $_POST['nombre'])) {
        // Si el nombre no cumple con el formato, redirigir de vuelta al formulario de registro con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato del nombre es incorrecto, solo debe incluir minúsculas y mayúsculas, de 4 a 40 caracteres");
        echo '<script>
            limpiarCampos();
        </script>';
        exit();
    }

    // Validar el formato del apellido con una expresión regular
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]{4,40}$/", $_POST['apellido'])) {
        // Si el apellido no cumple con el formato, redirigir de vuelta al formulario de registro con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato del apellido solo debe incluir minúsculas y mayúsculas, de 4 a 40 caracteres");
        echo '<script>
        limpiarCampos();
    </script>';
        exit();
    }

    // Validar el formato del email con una expresión regular
    if (!preg_match("/^([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+\.[a-zA-Z]{2,})(\.[a-zA-Z]{2,})?$/", $_POST['email'])) {
        // Si el usuario no cumple con el formato, redirigir de vuelta al formulario de registro con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato del correo es incorrecto, puede utilizar el formato jose.jose@correo.correo");
        echo '<script>
        limpiarCampos();
        </script>';
        exit();
    }

    // Validar el formato del email con filter_var
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Si el email no cumple con el formato, redirigir de vuelta al formulario de registro con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato del correo es incorrecto, puede utilizar el formato jose.jose@correo.correo");
        echo '<script>
        limpiarCampos();
        </script>';
        exit();
    }

    // Validar el formato de la contraseña con una expresión regular
    if (!preg_match("/^[a-zA-Z0-9#$%&\/()?¿]{4,50}$/", $_POST['contrasena'])) {
        // Si la contraseña no cumple con el formato, redirigir de vuelta al formulario de inicio con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato de la contraseña es incorrecto, debe incluir una letra minúscula, una mayúscula, un número y un carácter especial #$%&/()?¿. Debe ser de 4 a 50 caracteres");
        echo '<script>
   limpiarCampos();
</script>';
        exit();
    }

    // Validar el formato de la contraseña2 con una expresión regular
    if (!preg_match("/^[a-zA-Z0-9#$%&\/()?¿]{4,50}$/", $_POST['contrasena2'])) {
        // Si la contraseña2 no cumple con el formato, redirigir de vuelta al formulario de inicio con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato de la contraseña2 es incorrecto, debe incluir una letra minúscula, una mayúscula, un número y un carácter especial #$%&/()?¿. Debe ser de 4 a 50 caracteres");
        echo '<script>
   limpiarCampos();
</script>';
        exit();
    }

    //Revisar que las contraseñas coincidan
    if ($_POST['contrasena'] !== $_POST['contrasena2']) {
        // Si no coinciden, redirigir con mensaje de error
        header("Location: ../VISTA/registro.php?error=La contraseña y la confirmación de contraseña no coinciden");
        exit();
    }

    // Validar el formato de la categoria con una expresión regular
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]{4,40}$/", $_POST['categoria'])) {
        // Si la categoria no cumple con el formato, redirigir de vuelta al formulario de registro con un mensaje de error
        header("Location: ../VISTA/registro.php?error=El formato de la categoria es incorrecto, solo debe incluir minúsculas y mayúsculas, de 4 a 40 caracteres");
        echo '<script>
   limpiarCampos();
</script>';
        exit();
    }
}

// Verificar si el usuario ya está registrado
$usuario_existente = verificarUsuarioRegistrado($nombre, $contrasena);

if ($usuario_existente) {
    // Si el usuario ya existe, muestra un mensaje de error y no guarda el nuevo registro
    header("Location: ../VISTA/registro.php?error=El usuario ya está registrado en la base de datos");
    exit();
} else {
    // Si el usuario no existe, guarda el nuevo registro en la base de datos
    

// Encriptar la contraseña
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    guardarUsuario($usuario, $nombre, $apellido, $email, $contrasena_encriptada, $categoria);

    // Luego de guardar el usuario, muestra un mensaje de éxito
    //echo '¡Usuario registrado con éxito!';

    //Despues de guardar el registro se redirige al formulario del Login
    header("Location: ../VISTA/inicio.php");
exit(); // Asegurarse de que el script se detenga después de la redirección
}

