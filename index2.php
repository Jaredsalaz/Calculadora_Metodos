<!DOCTYPE html>
<html>
<head>
    <title>Esquina Noreste</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <header>Esquina Noreste</header>

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

    <form id="matrixForm" action="funciones_esquina.php" method="post">
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
    <div id="navbar">
        <img src="imagenes/barra-de-navegacion.png" class="nav-item" onclick="toggleDropdown()">
        <div id="dropdown" class="dropdown-content">
            <a href="index.php">Metodo de Costo Minimo</a>
        </div>
    </div>
    <script src="JS/script.js"></script>
</body>
</html>