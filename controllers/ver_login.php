<?php
include("../models/conexao.php");

$max_login_attempts = 5;
$lockout_time = 300; 
session_start();
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $max_login_attempts) {
  if ($_SESSION['last_login_attempt'] + $lockout_time > time()) {
    header("location:../views/login.php?bloqueado");
    exit;
  }
  // redefinir contagem de tentativas
  unset($_SESSION['login_attempts']);
}

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = trim($_POST['senha']);

$stmt = $conn->prepare("SELECT id, senha FROM clients WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  if (password_verify($password, $row['senha'])) {
    session_start();
    $_SESSION['user_id'] = $row['id'];
    unset($_SESSION['login_attempts']);
    header('Location: ./main.php');
    exit;
  }
}

if (!isset($_SESSION['login_attempts'])) {
  $_SESSION['login_attempts'] = 1;
} else {
  $_SESSION['login_attempts']++;
}
$_SESSION['last_login_attempt'] = time();
header("location:../views/login.php?erro");
?>





