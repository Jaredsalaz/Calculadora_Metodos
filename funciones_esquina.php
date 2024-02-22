<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esquina Noreste</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <header>Esquina Noreste</header>
    <div class="result">
        <?php
        include 'esquina-noreste.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibe los datos del formulario
            $filas = $_POST['filas'];
            $columnas = $_POST['columnas'];
            $costos = $_POST['costos'];
            $oferta = $_POST['oferta'];
            $demanda = $_POST['demanda'];
        
            // Calcula los resultados utilizando el método de la esquina noroeste
            $resultados = esquina_noroeste($costos, $oferta, $demanda);
        
            // Imprime los resultados
            echo '<h3>Resultados</h3>';
            echo '<table>';
            for ($i = 0; $i < $filas; $i++) {
                echo '<tr>';
                for ($j = 0; $j < $columnas; $j++) {
                    echo '<td>' . $resultados[$i][$j] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

            // Calcula e imprime la matriz de costos multiplicados por los resultados
            echo '<h3>Costos multiplicados por los resultados</h3>';
            echo '<table>';
            $suma = 0;
            for ($i = 0; $i < $filas; $i++) {
                echo '<tr>';
                for ($j = 0; $j < $columnas; $j++) {
                    $valor = $costos[$i][$j] * $resultados[$i][$j];
                    echo '<td>' . $valor . '</td>';
                    if ($valor > 1) {
                        $suma += $valor;
                    }
                }
                echo '</tr>';
            }
            echo '</table>';

            // Imprime la suma de los valores mayores a 1
            echo "Suma de los valores mayores a 1: <span>" . $suma . "</span>";
        }

        ?>
    </div>
    <footer>© 2024 Mi Aplicación</footer>    
</body>
</html>