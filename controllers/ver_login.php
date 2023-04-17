<?php
include("../models/conexao.php");
// recebe os dados do formulário de login
$email = $_POST['email'];
$password = $_POST['senha'];

// consulta SQL
$sql = "SELECT * FROM clients WHERE email = '$email' AND senha = '$password'";

// executa a consulta
$result = mysqli_query($conn, $sql);

// verifica se a consulta retornou algum resultado
if (mysqli_num_rows($result) == 1) {
  // se houver um registro correspondente, o usuário está autenticado
  session_start();
  $_SESSION['user_id'] = mysqli_fetch_assoc($result)['id'];
  header('Location: ./main.php');
  exit;
} 
else {
  header("location:../views/login.php?erro");
}
?>