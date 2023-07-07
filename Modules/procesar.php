<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Por favor ingrese un correo electrónico válido';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        if ($_FILES['archivo']['error'] == 0 && pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION) == 'txt') {
            $archivo = file($_FILES['archivo']['tmp_name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $html = '<!DOCTYPE html>
            <html>
            <head>
                <title>Resultado</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container mt-5 col-5">
                    <h1>Resultado:</h1>
                    <table class="table mt-5 text-center">
                        <thead><tr><th>Palabra</th><th>Cantidad de Letras</th></tr></thead>
                        <tbody>';


            foreach($archivo as $linea) {
                $html .= '<tr><td>'.$linea.'</td><td>'.strlen($linea).'</td></tr>';
            }

            $html .= '</tbody></table><a href="../index.php" class="btn btn-primary mt-3">Volver</a></div></body></html>';

            echo $html;
        } else {
            $_SESSION['error'] = 'Por favor suba un archivo TXT válido';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
?>
