<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Suma de Pares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Calculadora de Suma de Pares</h1>
        
        <!-- Inicio de formulario -->
        <form action="calculadora.php" method="POST" onsubmit="return validarFormulario()">
            <div class="form-group mt-3">
                <label for="numeros">Introduce números separados por coma, punto, barra, guión o cualquier otro carácter no alfanumérico</label>
                <input type="text" name="numeros" id="numeros" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Calcular suma de pares</button>
        </form>
        <!-- Fin de formulario -->

        <!-- Enlace de Volver -->
        <a href="../index.php" class="btn btn-warning mt-3">Volver</a>

        <?php
        // Comprobación del método de solicitud
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeros = explode(',', $_POST['numeros']); // Convierte la cadena en un array
            $sumaPares = sumarNumerosPares($numeros);
            echo "<p class='mt-3'>La suma de los números pares es: $sumaPares</p>";
        }

        // Función para sumar los números pares en un array
        function sumarNumerosPares($array) {
            $suma = 0;
            foreach ($array as $numero) {
                if ($numero % 2 == 0) {
                    $suma += $numero;
                }
            }
            return $suma;
        }
        ?>
    </div>

    <!-- Inicio de sección JavaScript -->
    <script>
        // Función para validar el formulario antes de enviarlo
        function validarFormulario() {
            var numerosInput = document.getElementById('numeros');
            var numeros = numerosInput.value;

            var numerosArray = numeros.split(/\W+/); 

            // Comprobación de cada elemento del array si es un número válido
            for (var i = 0; i < numerosArray.length; i++) {
                if (isNaN(numerosArray[i])) {
                    alert('Formato incorrecto, por favor inténtelo de nuevo');
                    return false;
                }
            }

            return true;
        }
    </script>
    <!-- Fin de sección JavaScript -->
</body>
</html>
