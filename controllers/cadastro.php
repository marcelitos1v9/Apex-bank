<?php
include("../models/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = mysqli_real_escape_string($conn, $_POST['nome_cadastro']);
  $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome_cadastro']);
  $cpf = mysqli_real_escape_string($conn, $_POST['cpf_cadastro']);
  $endereco = mysqli_real_escape_string($conn, $_POST['endereco_cadastro']);
  $telefone = mysqli_real_escape_string($conn, $_POST['tel_cadastro']);
  $email = mysqli_real_escape_string($conn, $_POST['email_cadastro']);
  $senha = mysqli_real_escape_string($conn, $_POST['senha_cadastro']);

  $sql_cpf = "SELECT * FROM clients WHERE cpf = '$cpf'";
  $result_cpf = mysqli_query($conn, $sql_cpf);
  if (mysqli_num_rows($result_cpf) > 0) {
    header("Location: ../views/cadastro.php?cpf_cadastrado");
    exit;
  }

  $sql_email = "SELECT * FROM clients WHERE email = '$email'";
  $result_email = mysqli_query($conn, $sql_email);
  if (mysqli_num_rows($result_email) > 0) {
    header("Location: ../views/cadastro.php?email_cadastrado");
    exit;
  }

  $sql_insert = "INSERT INTO clients (nome,sobrenome, cpf, endereco, telefone, email, senha) VALUES ('$nome','$sobrenome', '$cpf', '$endereco', '$telefone', '$email', '$senha')";
  mysqli_query($conn, $sql_insert);

  $user_id = mysqli_insert_id($conn); 

  $sql_update = "UPDATE clients SET id = '$user_id' WHERE cpf = '$cpf'"; 
  mysqli_query($conn, $sql_update);

  session_start();
  $_SESSION['user_id'] = $user_id;

  header('Location:../views/inicial_user.php');
  exit;
}
?>
