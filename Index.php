<!DOCTYPE html>
<html>
<head>
    <title>Costo Minimo</title>
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
        form {
            background: #fff;
            margin: 50px auto;
            width: 300px;
            padding: 2em;
            border: 1px solid #CCC;
            border-radius: 2em;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        form div + div {
            margin-top: 1em;
        }
        label {
            display: inline-block;
            width: 90px;
            text-align: right;
        }
        input, textarea {
            font: 1em sans-serif;
            width: 200px;
            box-sizing: border-box;
            border: 1px solid #999;
            border-radius: 2em;
            padding: 0.5em;
        }
        .button {
            padding-left: 90px;
        }
        button {
            margin-left: .5em;
        }
        table {
            margin-top: 1em;
            border-collapse: collapse;
            width: 100%;
        }
        td {
            padding: 0.5em;
            border: 1px solid #ccc;
            text-align: center;
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <header>Costo Minimo</header>

    <script>
    function actualizarMatriz() {
        var filas = document.getElementById('filas').value;
        var columnas = document.getElementById('columnas').value;

        var matriz = document.getElementById('matriz');
        matriz.innerHTML = '';

        var table = document.createElement('table');
        for (var i = 0; i < filas; i++) {
            var tr = document.createElement('tr');
            for (var j = 0; j < columnas; j++) {
                var td = document.createElement('td');
                var input = document.createElement('input');
                input.type = 'number';
                input.name = 'costos[' + i + '][]';
                td.appendChild(input);
                tr.appendChild(td);
            }
            table.appendChild(tr);
        }
        matriz.appendChild(table);

        var oferta = document.getElementById('oferta');
        oferta.innerHTML = '';
        for (var i = 0; i < filas; i++) {
            var input = document.createElement('input');
            input.type = 'number';
            input.name = 'oferta[]';
            oferta.appendChild(input);
        }

        var demanda = document.getElementById('demanda');
        demanda.innerHTML = '';
        for (var i = 0; i < columnas; i++) {
            var input = document.createElement('input');
            input.type = 'number';
            input.name = 'demanda[]';
            demanda.appendChild(input);
        }
    }
    </script>

    <form id="matrixForm" action="funciones.php" method="post">
        <label for="filas">Número de filas:</label>
        <input type="number" id="filas" name="filas" oninput="actualizarMatriz()">

        <label for="columnas">Número de columnas:</label>
        <input type="number" id="columnas" name="columnas" oninput="actualizarMatriz()">

        <h2>Costos</h2>
        <div id="matriz"></div>

        <h2>Oferta</h2>
        <div id="oferta"></div>

        <h2>Demanda</h2>
        <div id="demanda"></div>

        <input type="submit" value="Calcular">
    </form>
    <footer>© 2024 Jared Daniel Salazar Sanchez</footer>
</body>
</html>