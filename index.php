<!DOCTYPE html>
<html>
<head>
    <title>Subir TXT y Contar Letras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Subir archivo TXT</h1>
        
        <!-- Inicio de sección PHP -->
        <?php
            // Inicio de sesión
            session_start();

            // Comprobación de existencia de variable de sesión 'error'
            if (!empty($_SESSION['error'])) {
                echo "<script>alert('" . $_SESSION['error'] . "');</script>";
                unset($_SESSION['error']);
            }
        ?>
        <!-- Fin de sección PHP -->

        <!-- Inicio de formulario -->
        <form action="Modules/procesar.php" method="POST" enctype="multipart/form-data" onsubmit="guardarDatosFormulario()">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="archivo">Archivo TXT</label>
                <input type="file" name="archivo" id="archivo" class="form-control-file" accept=".txt" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
            <button type="button" onclick="borrarArchivo()" class="btn btn-danger mt-3">Borrar archivo</button>
        </form>
        <!-- Fin de formulario -->

        <!-- Inicio de enlace -->
        <a href="Modules/calculadora.php" class="btn btn-success mt-3">Ir a calculadora de números pares</a>
        <!-- Fin de enlace -->
    </div>

    <!-- Inicio de sección JavaScript -->
    <script>
        // Función para guardar el valor del campo de correo electrónico en el almacenamiento local (localStorage)
        function guardarDatosFormulario() {
            localStorage.setItem('email', document.getElementById('email').value);
        }

        // Función para recuperar el valor del campo de correo electrónico desde el almacenamiento local (localStorage)
        function recuperarDatosFormulario() {
            var email = localStorage.getItem('email');
            if(email) {
                document.getElementById('email').value = email;
            }
        }

        // Función para borrar el archivo seleccionado
        function borrarArchivo() {
            document.getElementById('archivo').value = "";
        }
    </script>
    <!-- Fin de sección JavaScript -->
</body>
</html>
