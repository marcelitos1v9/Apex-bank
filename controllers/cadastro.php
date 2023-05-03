<?php
include("../models/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome_cadastro'];
  $sobrenome = $_POST['sobrenome_cadastro'];
  $cpf = $_POST['cpf_cadastro'];
  $endereco = $_POST['endereco_cadastro'];
  $telefone = $_POST['tel_cadastro'];
  $email = $_POST['email_cadastro'];
  $senha = $_POST['senha_cadastro'];

  // Verifica se o CPF já está cadastrado
  $sql_cpf = "SELECT * FROM clients WHERE cpf = ?";
  $stmt_cpf = mysqli_prepare($conn, $sql_cpf);
  mysqli_stmt_bind_param($stmt_cpf, "s", $cpf);
  mysqli_stmt_execute($stmt_cpf);
  $result_cpf = mysqli_stmt_get_result($stmt_cpf);
  if (mysqli_num_rows($result_cpf) > 0) {
    header("Location: ../views/cadastro.php?cpf_cadastrado");
    exit;
  }

  // Verifica se o e-mail já está cadastrado
  $sql_email = "SELECT * FROM clients WHERE email = ?";
  $stmt_email = mysqli_prepare($conn, $sql_email);
  mysqli_stmt_bind_param($stmt_email, "s", $email);
  mysqli_stmt_execute($stmt_email);
  $result_email = mysqli_stmt_get_result($stmt_email);
  if (mysqli_num_rows($result_email) > 0) {
    header("Location: ../views/cadastro.php?email_cadastrado");
    exit;
  }

  // Insere o novo usuário no banco de dados
  $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
  $sql_insert = "INSERT INTO clients (nome, sobrenome, cpf, endereco, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt_insert = mysqli_prepare($conn, $sql_insert);
  mysqli_stmt_bind_param($stmt_insert, "sssssss", $nome, $sobrenome, $cpf, $endereco, $telefone, $email, $senha_hash);
  mysqli_stmt_execute($stmt_insert);

  $user_id = mysqli_insert_id($conn); 

  $sql_update = "UPDATE clients SET id = ? WHERE cpf = ?";
  $stmt_update = mysqli_prepare($conn, $sql_update);
  mysqli_stmt_bind_param($stmt_update, "is", $user_id, $cpf);
  mysqli_stmt_execute($stmt_update);

  // Inicia a sessão e redireciona para a página inicial do usuário
  session_start();
  $_SESSION['user_id'] = $user_id;

  header('Location:../views/inicial_user.php');
  exit;
}
?>
