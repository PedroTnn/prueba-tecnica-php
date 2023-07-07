<!DOCTYPE html>
<html>
<head>
    <title>Subir TXT y Contar Letras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <a href="Modules/calculadora.php" class="btn btn-success mt-3">Ir a calculadora de numeros pares</a>

    </div>
    <script>
    function guardarDatosFormulario() {
       
        localStorage.setItem('email', document.getElementById('email').value);
     
    }

    function recuperarDatosFormulario() {
  
        var email = localStorage.getItem('email');
        if(email) {
            document.getElementById('email').value = email;
        }
    }
    </script>
</body>
</html>
