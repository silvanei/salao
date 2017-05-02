<?php

$tamanhoDaFila = 10;

$parametros = [
    'Cliente 1' => 5,
    'Cliente 2' => 5
];


//[1, 1, 2, 1, 1, 2, 1, 1, 2, 1];

if(array_sum($parametros) != $tamanhoDaFila) {
    die("Deve ser 100%");
}

var_dump($parametros);

$filaDePrioridade = new SplPriorityQueue();
$teste = 1;
foreach ($parametros as $cliente => $percentual) {
    for ($i = 1; $i <= $percentual; $i++) {
        $prioridade = $i + ($teste / $tamanhoDaFila);
        $filaDePrioridade->insert(sprintf('%s => %s', $prioridade, $cliente), $prioridade);
    }
    var_dump($teste);
    $teste++;
}

echo '=====================================';
foreach ($filaDePrioridade as $key => $item) {
    var_dump($item);
}