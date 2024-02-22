<?php
function esquina_noroeste($costos, $oferta, $demanda) {
    // Inicializa la matriz de resultados con ceros
    $res = array_fill(0, count($oferta), array_fill(0, count($demanda), 0));
    // Copia las matrices de oferta y demanda para llevar un seguimiento de los valores restantes
    $ofertaRestante = $oferta;
    $demandaRestante = $demanda;

    // Índices para recorrer la oferta y la demanda
    $i = 0;
    $j = 0;

    // Mientras haya oferta o demanda restante
    while ($i < count($oferta) && $j < count($demanda)) {
        // Calcula la cantidad a transportar como el mínimo entre la oferta y la demanda restante
        $cantidad = min($ofertaRestante[$i], $demandaRestante[$j]);
        // Actualiza la matriz de resultados y las matrices de oferta y demanda restante
        $res[$i][$j] = $cantidad;
        $ofertaRestante[$i] -= $cantidad;
        $demandaRestante[$j] -= $cantidad;

        // Si la oferta se agotó, pasa a la siguiente oferta
        if ($ofertaRestante[$i] == 0) $i++;
        // Si la demanda se agotó, pasa a la siguiente demanda
        if ($demandaRestante[$j] == 0) $j++;
    }

    // Devuelve la matriz de resultados
    return $res;
}
?>