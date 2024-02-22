<!DOCTYPE html>
<html>
<head>
    <title>Costo Minimo</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>Costo Minimo</header>
    <div class="result">
        <?php
        include 'costo-minimo.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $costos = $_POST['costos'];
            $oferta = $_POST['oferta'];
            $demanda = $_POST['demanda'];

            list($resultado, $resultadoMultiplicado) = costo_minimo_transporte($costos, $oferta, $demanda);

            // Imprime la matriz resuelta
            echo "<h3>Matriz de resultados:</h3>";
            echo "<table>";
            foreach ($resultado as $fila) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>" . $valor . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            // Imprime la matriz de costos multiplicada por los resultados
            if (isset($resultadoMultiplicado)) {
                echo "<h3>Matriz de costos multiplicada por los resultados:</h3>";
                echo "<table>";
                $suma = 0;
                foreach ($resultadoMultiplicado as $fila) {
                    echo "<tr>";
                    foreach ($fila as $valor) {
                        echo "<td>" . $valor . "</td>";
                        if ($valor > 1) {
                            $suma += $valor;
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "Suma de los valores mayores a 1: <span>" . $suma . "</span>";
            }
        }
        ?>
    </div>
    <footer>© 2024 Mi Aplicación</footer>
</body>
</html>