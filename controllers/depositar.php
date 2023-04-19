<?php
session_start();
include("../models/conexao.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$valor = $_POST['deposito_valor'];

$sql = "SELECT saldo FROM clients WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$exibe = mysqli_fetch_array($result);
$saldo_atual = $exibe['saldo'];

$novo_saldo = $saldo_atual + $valor;

$sql = "UPDATE clients SET saldo = $novo_saldo WHERE id = $user_id";
if (mysqli_query($conn, $sql)) {
    header('Location: ../views/deposito.php?sucesso');
} else {
    header('Location: ../views/depositar.php?fracasso');
}
?>