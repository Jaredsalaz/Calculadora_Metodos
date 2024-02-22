<?php
function costo_minimo_transporte($costos, $oferta, $demanda) {
    // Inicializa la matriz de resultados con ceros
    $res = array_fill(0, count($oferta), array_fill(0, count($demanda), 0));
    // Copia las matrices de oferta y demanda para llevar un seguimiento de los valores restantes
    $ofertaRestante = $oferta;
    $demandaRestante = $demanda;

    // Mientras haya oferta restante
    while (array_sum($ofertaRestante) > 0) {
        // Inicializa el costo mínimo a infinito y los índices a -1
        $minCosto = INF;
        $minI = -1;
        $minJ = -1;

        // Recorre todas las ofertas y demandas
        for ($i = 0; $i < count($oferta); $i++) {
            for ($j = 0; $j < count($demanda); $j++) {
                // Si hay oferta y demanda restante y el costo es menor que el mínimo actual
                if ($ofertaRestante[$i] > 0 && $demandaRestante[$j] > 0 && $costos[$i][$j] < $minCosto) {
                    // Actualiza el costo mínimo y los índices
                    $minCosto = $costos[$i][$j];
                    $minI = $i;
                    $minJ = $j;
                }
            }
        }

        // Calcula la cantidad a transportar como el mínimo entre la oferta y la demanda restante
        $cantidad = min($ofertaRestante[$minI], $demandaRestante[$minJ]);
        // Actualiza la matriz de resultados y las matrices de oferta y demanda restante
        $res[$minI][$minJ] = $cantidad;
        $ofertaRestante[$minI] -= $cantidad;
        $demandaRestante[$minJ] -= $cantidad;
    }

    // Inicializa la matriz de resultados multiplicados por los costos con ceros
    $resMultiplicado = array_fill(0, count($oferta), array_fill(0, count($demanda), 0));
    // Recorre todas las ofertas y demandas
    for ($i = 0; $i < count($oferta); $i++) {
        for ($j = 0; $j < count($demanda); $j++) {
            // Multiplica la cantidad transportada por el costo y guardar el resultado
            $resMultiplicado[$i][$j] = $res[$i][$j] * $costos[$i][$j];
        }
    }

    // Devueve las matrices de resultados y de resultados multiplicados por los costos
    return [$res, $resMultiplicado];
}
?>