<?php 

// ORDENAR PRODUCTOS 

function cicloCultivo($dias)
{

    $output = match (true) {
        $dias < 60 => 'corto',
        $dias <= 90 => 'medio',
        $dias <= 90 => 'largo',
        $dias > 90 => 'muy largo',
    };
    return $output;
}
