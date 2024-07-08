<?php
// Controlador: procesaCargaFotos.php

require_once '../MODELO/conexion.php';
require_once '../MODELO/modCargaFoto.php';

$allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxFileSize = 2 * 1024 * 1024; // 2MB

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'getCategorias') {
    // Obtener categorías desde la base de datos
    try {
        $stmt = $conexion->prepare("SELECT CategoriaID, Nombre FROM categorias");
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($categorias);
    } catch (PDOException $e) {
        echo json_encode([]);
    }
    exit();
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = isset($_POST['titulo']) ? htmlspecialchars(trim($_POST['titulo'])) : '';
    $descripcion = isset($_POST['texto']) ? htmlspecialchars(trim($_POST['texto'])) : '';
    $fechaCarga = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $categoria = isset($_POST['categoria']) ? htmlspecialchars(trim($_POST['categoria'])) : '';
    
    // Validar campos
    if (empty($titulo) || empty($descripcion) || empty($fechaCarga) || empty($categoria)) {
        $message = "Todos los campos son obligatorios.";
        showMessageAndRedirect($message);
    }

    // Validar formato de fecha
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaCarga)) {
        $message = "Formato de fecha inválido.";
        showMessageAndRedirect($message);
    }

    // Verificar que se haya subido un archivo y validar el archivo subido
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $nombreArchivo = basename($foto['name']);
        $tipoArchivo = $foto['type'];
        $tamanoArchivo = $foto['size'];
        
        // Validar tipo de archivo
        if (!in_array($tipoArchivo, $allowedFileTypes)) {
            $message = "Tipo de archivo no permitido. Solo se permiten JPG, PNG y GIF.";
            showMessageAndRedirect($message);
        }

        // Validar tamaño del archivo
        if ($tamanoArchivo > $maxFileSize) {
            $message = "El tamaño del archivo no debe exceder los 2MB.";
            showMessageAndRedirect($message);
        }

        $directorioDestino = '../uploads/';

        // Verificar si el directorio de destino existe, si no, crearlo
        if (!is_dir($directorioDestino)) {
            if (!mkdir($directorioDestino, 0777, true)) {
                $message = "Error al crear el directorio 'uploads'.";
                showMessageAndRedirect($message);
            }
        }

        // Verificar permisos del directorio
        if (!is_writable($directorioDestino)) {
            $message = "El directorio 'uploads' no tiene permisos de escritura.";
            showMessageAndRedirect($message);
        }

        // Ensure the filename is unique
        $rutaArchivo = $directorioDestino . time() . "_" . $nombreArchivo;

        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($foto['tmp_name'], $rutaArchivo)) {
            // Guardar la información en la base de datos
            $urlImagen = $rutaArchivo;

            try {
                $resultado = guardarFoto($titulo, $descripcion, $urlImagen, $fechaCarga, $categoria);

                if ($resultado) {
                    $message = "Fotografía guardada correctamente.";
                } else {
                    $message = "Error al guardar la fotografía.";
                }
            } catch (Exception $e) {
                $message = "Error al guardar la fotografía: " . $e->getMessage();
            }
        } else {
            $message = "Error al subir la fotografía.";
        }
    } else {
        $message = "No se ha subido ninguna fotografía.";
    }
} else {
    $message = "Método de solicitud no válido.";
}

function showMessageAndRedirect($message) {
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Mensaje</title>
        <style>
            .message-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Arial, sans-serif;
                text-align: center;
                background-color: #f0f0f0;
            }
            .message-box {
                padding: 20px;
                background-color: white;
                border: 1px solid #ccc;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        </style>
        <script>
            function redirect() {
                setTimeout(function() {
                    window.location.href = '../VISTA/formFoto.php'; // Línea de redirección actualizada
                }, 3000);
            }
        </script>
    </head>
    <body onload='redirect()'>
        <div class='message-container'>
            <div class='message-box'>
                <p>$message</p>
                <p>Serás redirigido en 3 segundos...</p>
            </div>
        </div>
    </body>
    </html>";
    exit();
}

showMessageAndRedirect($message);
?>