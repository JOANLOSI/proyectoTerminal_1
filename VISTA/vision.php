<body>
    <?php include_once 'header.php'; ?>
    <div class="container-mision">

        <img src="../img/marco4.svg" alt="Marco" class="marco">

        <div class="texto">
            <h2 class="mision">VISIÓN</h2>
            Contribuir en el avance y desarrollo de los cuidados odontológicos en nuestra comunidad, con soluciones integrales que agreguen valor a sus prácticas logrando con esto ser reconocidos como una empresa estratégica para los consultorios dentales en su crecimiento y éxito.<br>
        </div>
    </div>

    <a href="../index.php" class="fminvRegresar">REGRESAR</a>

    <div class="editar">
        <a href="editarVision.php" class="editarMision" id="editarMisionLink">Editar Visión</a>
    </div>

    <script>
        document.getElementById('editarMisionLink').addEventListener('click', function(event) {
            if (!confirm('¿Estás seguro de que deseas editar la visión?')) {
                event.preventDefault(); // Evitar la navegación si el usuario cancela
            }
        });
    </script>
</body>
<?php include_once 'footer.php'; ?>
</html>
