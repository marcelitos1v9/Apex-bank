<?php
$valor = $_POST['valor'];
$parcelas = $_POST['parcelas'];
$juros = $_POST['juros'] / 100;

$parcela = ($valor * $juros) / (1 - pow(1 + $juros, -$parcelas));

$total = $parcela * $parcelas;
$juros_total = $total - $valor;

function juros(){
echo '<div class="alert alert-success" role="alert">';
echo 'Valor do empréstimo: R$' . number_format($valor, 2, ',', '.') . '<br>';
echo 'Número de parcelas: ' . $parcelas . '<br>';
echo 'Taxa de juros: ' . number_format($juros * 100, 2, ',', '.') . '% ao mês<br>';
echo 'Valor da parcela: R$' . number_format($parcela, 2, ',', '.') . '<br>';
echo 'Valor total a pagar: R$' . number_format($total, 2, ',', '.') . '<br>';
echo 'Valor total de juros: R$' . number_format($juros_total, 2, ',', '.') . '<br>';
echo '</div>';
}
?>