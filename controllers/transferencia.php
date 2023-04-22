<?php
session_start();
include("../models/conexao.php");

if (!isset($_SESSION['user_id'])) { 
    header('Location: ./login.php'); 
    exit; 
} 

$user_id = $_SESSION['user_id']; 

if(isset($_POST['destinatario_id']) && isset($_POST['valor_transferencia'])) {
    $destinatario_id = $_POST['destinatario_id'];
    $valor_transferencia = $_POST['valor_transferencia'];

    // Verifica se o valor é menor ou igual ao saldo do usuário
    $sql_verifica_saldo = "SELECT saldo FROM clients WHERE id = $user_id";
    $result_verifica_saldo = mysqli_query($conn, $sql_verifica_saldo);
    $exibe_verifica_saldo = mysqli_fetch_array($result_verifica_saldo);

    if($valor_transferencia <= $exibe_verifica_saldo['saldo']) {
        // Realiza a transferência
        $sql_transferencia = "UPDATE clients SET saldo = saldo - $valor_transferencia WHERE id = $user_id;
                              UPDATE clients SET saldo = saldo + $valor_transferencia WHERE id = $destinatario_id;";
        $result_transferencia = mysqli_multi_query($conn, $sql_transferencia);

        if($result_transferencia) {
            header('Location: ../views/pix.php?transferencia=sucesso');
            exit;
        } else {
            header('Location: ../views/pix.php?transferencia=erro');
            exit;
        }
    } else {
        header('Location: ../views/pix.php?transferencia=saldo_insuficiente');
        exit;
    }
}
?>