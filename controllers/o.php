<?php 
 require_once("conexao.php");
 $dados = $_POST;
$sql = "Insert into clientes (nome, end, tel) values (?, ?, ?)";
$conexao = novaConexao();

$params = [ $dados['nome'],
            $dados['end']
            $dados['tel']];

$insert = bind_param["sss",...$params];

$inset = $conexao -> prepare($sql);

$insert -> execute;

?>1