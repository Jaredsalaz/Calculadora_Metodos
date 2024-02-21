<!DOCTYPE html>
<html>
<head>
    <title>Esqina Noreste</title>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background: #f2f2f2;
            color: #333;
        }
        header {
            background: #333;
            color: #f2f2f2;
            padding: 10px 0;
            text-align: center;
            font-size: 2em;
            font-weight: bold;
        }
        footer {
            background: #333;
            color: #f2f2f2;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .result {
            background: #fff;
            margin: 50px auto;
            width: 300px;
            padding: 2em;
            border: 1px solid #CCC;
            border-radius: 2em;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 1.5em;
        }
        .result span {
            color: #f00;
            font-weight: bold;
        }
        table {
            margin-top: 1em;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            padding: 0.5em;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>Costo Minimo</header>
    <div class="result">
        <?php
        include 'transporte.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $costos = $_POST['costos'];
            $oferta = $_POST['oferta'];
            $demanda = $_POST['demanda'];

            list($resultado, $resultadoMultiplicado) = costo_minimo_transporte($costos, $oferta, $demanda);

            // Imprimir la matriz resuelta
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

            // Imprimir la matriz de costos multiplicada por los resultados
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