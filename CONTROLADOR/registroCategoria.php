<?php
require '../MODELO/modregistroCategoria.php';

$errors = [];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Protección contra ataques XSS
    $nombre = htmlspecialchars(trim($_POST['Nombre']));

    // Validaciones
    if (empty($nombre)) {
        $errors[] = "El campo 'Nombre' es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z0-9\s]+$/", $nombre)) {
        $errors[] = "El 'Nombre' debe contener solo letras, números y espacios.";
    }

    // Procesar si no hay errores
    if (empty($errors)) {
        if (registrarCategoria($nombre)) {
            $mensaje = "Categoría registrada con éxito.";
        } else {
            $mensaje = "Hubo un error al registrar la categoría.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="deposito, dental">
    <meta name="description" content="Sitio web para el manejo y control de inventario y ventas del Deposito Dental Hersan">
    <meta name="author" content="José Antonio López Silva">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Nueva Categoría - DEPOSITO DENTAL HERSAN</title>

    <script>
        // Función para mostrar mensaje de éxito temporal
        function mostrarMensaje(mensaje) {
            alert(mensaje);
            setTimeout(function() {
                window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
            }, 2000); // Redirigir después de 3 segundos
        }
    </script>
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>Nueva Categoría</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($mensaje): ?>
        <script>mostrarMensaje("<?php echo $mensaje; ?>");</script>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>
        <br>
        <input type="submit" value="Registrar Categoría">
    </form>
</body>

</html>