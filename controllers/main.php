<?php
session_start();

// verifica se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
  header('Location: ../views/login.php');
  exit;
}

// usa o ID do usuário na página
$user_id = $_SESSION['user_id'];
echo "Bem-vindo, usuário $user_id!";
?>