<?php
include("../models/conexao.php");

// recebe os dados do formulário de login
$email = trim($_POST['email']);
$password = trim($_POST['senha']);

// consulta SQL preparada
$stmt = $conn->prepare("SELECT id, senha FROM clients WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  if (password_verify($password, $row['senha'])) {
    session_start();
    $_SESSION['user_id'] = $row['id'];
    header('Location: ./main.php');
    exit;
  }
}

// autenticação falhou, redireciona para a página de login com mensagem de erro
header("location:../views/login.php?erro");
?>
