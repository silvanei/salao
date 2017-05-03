<?php

$tamanhoDaFila = 100;

$parametros = [
    'Cliente A' => 55,
    'Cliente B' => 45
];


//[1, 1, 2, 1, 1, 2, 1, 1, 2, 1];

if(array_sum($parametros) != $tamanhoDaFila) {
    die("Deve ser 100%");
}

var_dump($parametros);

$filaDePrioridade = new SplPriorityQueue();

$totalA = 1;
$totalB = 1;
$percentualA = 0;
$percentualB = 0;
for ($i = 1; $i <= $tamanhoDaFila; $i++) {

    $percentualA = floor(($i * $totalA) / $tamanhoDaFila);
    $percentualB = floor(($i * $totalB) / $tamanhoDaFila);
    var_dump(sprintf('%s => %s', $percentualA, $percentualB));

    if (($parametros['Cliente A'] - $percentualA) > ($parametros['Cliente B'] - $percentualB)) {
        $totalA++;
        $filaDePrioridade->insert('Cliente A', $i);
    } else {
        $totalB++;
        $filaDePrioridade->insert('Cliente B', $i);
    }

//    $percentualA = floor(($i * $totalA) / $tamanhoDaFila);
//    $percentualB = floor(($i * $totalB) / $tamanhoDaFila);
//    var_dump(sprintf('%s => %s', $percentualA, $percentualB));

}

echo '=====================================';
$totalA = 0;
$totalB = 0;
foreach ($filaDePrioridade as $key => $item) {
    var_dump($item);
    if ($item == 'Cliente A') {
        $totalA++;
    } else {
        $totalB++;
    }
}

var_dump($totalA, $totalB);