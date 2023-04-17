<?php
session_start();
include("../models/conexao.php");

// verifica se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
  header('Location: ../views/login.php');
  exit;
}else{
  header("location:../views/inicial_user.php");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM clients WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
//while
($exibe = mysqli_fetch_array($result, MYSQLI_ASSOC))
?>