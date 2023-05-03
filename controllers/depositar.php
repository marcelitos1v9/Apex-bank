<?php
session_start();
include("../models/conexao.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$valor = filter_input(INPUT_POST, 'deposito_valor', FILTER_SANITIZE_NUMBER_FLOAT);

$sql = "SELECT saldo FROM clients WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$exibe = $result->fetch_assoc();
$saldo_atual = $exibe['saldo'];

$novo_saldo = $saldo_atual + $valor;

$sql = "UPDATE clients SET saldo = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $novo_saldo, $user_id);
if ($stmt->execute()) {
    header('Location: ../views/deposito.php?sucesso');
} else {
    header('Location: ../views/depositar.php?fracasso');
}
?>