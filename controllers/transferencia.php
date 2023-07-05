<?php
session_start();
include("../models/conexao.php");

if (!isset($_SESSION['user_id'])) { 
    header('Location: ../views/login.php'); 
    exit; 
} 

$user_id = $_SESSION['user_id']; 

if(isset($_POST['destinatario_id']) && isset($_POST['valor_transferencia'])) {
    $destinatario_id = (int) $_POST['destinatario_id'];
    $valor_transferencia = (float) $_POST['valor_transferencia'];

    // Utilizar prepared statements para evitar SQL injection
    $sql_verifica_saldo = "SELECT saldo FROM clients WHERE id = ?";
    $stmt_verifica_saldo = mysqli_prepare($conn, $sql_verifica_saldo);
    mysqli_stmt_bind_param($stmt_verifica_saldo, 'i', $user_id);
    mysqli_stmt_execute($stmt_verifica_saldo);
    $exibe_verifica_saldo = mysqli_fetch_array(mysqli_stmt_get_result($stmt_verifica_saldo));

    if($valor_transferencia <= $exibe_verifica_saldo['saldo']) {

        // Dividir as declarações SQL em várias consultas para evitar múltiplas declarações SQL
        $sql_transferencia_1 = "UPDATE clients SET saldo = saldo - ? WHERE id = ?";
        $stmt_transferencia_1 = mysqli_prepare($conn, $sql_transferencia_1);
        mysqli_stmt_bind_param($stmt_transferencia_1, 'di', $valor_transferencia, $user_id);
        mysqli_stmt_execute($stmt_transferencia_1);

        $sql_transferencia_2 = "UPDATE clients SET saldo = saldo + ? WHERE id = ?";
        $stmt_transferencia_2 = mysqli_prepare($conn, $sql_transferencia_2);
        mysqli_stmt_bind_param($stmt_transferencia_2, 'di', $valor_transferencia, $destinatario_id);
        mysqli_stmt_execute($stmt_transferencia_2);

        $sql_transferencia_3 = "INSERT INTO transactions (id_conta,id_conta_recebe,valor,data_transacao) values (?, ?, ?, NOW())";
        $stmt_transferencia_3 = mysqli_prepare($conn, $sql_transferencia_3);
        mysqli_stmt_bind_param($stmt_transferencia_3, 'idd', $user_id, $destinatario_id, $valor_transferencia);
        mysqli_stmt_execute($stmt_transferencia_3);

        if(mysqli_stmt_affected_rows($stmt_transferencia_3) > 0) {
            header('Location: ../views/historico_trans.php?transferencia=sucesso');
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