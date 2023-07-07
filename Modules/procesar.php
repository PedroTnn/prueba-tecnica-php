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

            echo '<table class="table mt-5">';
            echo '<thead><tr><th>Palabra</th><th>Cantidad de Letras</th></tr></thead>';
            echo '<tbody>';

            foreach($archivo as $linea) {
                echo '<tr><td>'.$linea.'</td><td>'.strlen($linea).'</td></tr>';
            }

            echo '</tbody></table>';
        } else {
            $_SESSION['error'] = 'Por favor suba un archivo TXT válido';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
?>
