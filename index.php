<!DOCTYPE html>
<html>
<head>
    <title>Subir TXT y Contar Letras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css">
</head>
<body onload="recuperarDatosFormulario()">
    <div class="container">
        <h1 class="mt-5">Subir archivo TXT</h1>
        <?php
            session_start();
            if (!empty($_SESSION['error'])) {
                echo "<script>alert('" . $_SESSION['error'] . "');</script>";
                unset($_SESSION['error']);
            }
        ?>
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
            <button type="submit" name="borrar" class="btn btn-danger mt-3">Borrar datos</button>
        </form>
    </div>
    <script>
    function guardarDatosFormulario() {
        // Almacena los datos del formulario en el almacenamiento local antes de enviar el formulario
        localStorage.setItem('email', document.getElementById('email').value);
        // El campo del archivo no puede ser almacenado debido a restricciones de seguridad
    }

    function recuperarDatosFormulario() {
        // Recupera los datos del formulario del almacenamiento local cuando se carga la página
        var email = localStorage.getItem('email');
        if(email) {
            document.getElementById('email').value = email;
        }
    }
    </script>
</body>
</html>
