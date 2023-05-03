<?php 
include("../models/conexao.php"); 
include("./blades/header.php");

session_start(); 
$user_id = $_SESSION['user_id']; 
if (!isset($_SESSION['user_id'])) { 
    header('Location: ./login.php'); 
    exit; 
} 

$sql = "SELECT * FROM clients WHERE id = $user_id"; 
$result = mysqli_query($conn, $sql); 

while ($exibe = mysqli_fetch_array($result)) { 
?>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="navbar-nav m-auto">
                <div class="row">
                    <a class="nav-link p-2" href="./inicial_user.php">Voltar</a>
                    <a class="nav-link p-2" href="../controllers/logout.php">Sair</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid text-light p-6 mt-3" style="background: rgb(5,1,70);
            background: linear-gradient(90deg, rgba(5,1,70,1) 0%, rgba(95,26,181,1) 50%, rgba(5,1,70,1) 100%);">
            <div class="container text-center">
                <h1 class="display-4">Apex Bank</h1>
                <p class="lead mt-3"><?php echo ucfirst($exibe["nome"]) ?> esse é o seu histórico de transações</p>
            </div>
        </div>
    </header>

    <div class="container mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Operação</th>
                <th scope="col">Usuário envolvido</th>
                <th scope="col">Valor</th>
                <th scope="col">Data e hora</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $transactions_sql = "SELECT transactions.*, 
                clients_destinatario.nome AS nome_destinatario,
                clients_destinatario.sobrenome as sobrenome_destinatario,
                clients_remetente.nome AS nome_remetente,
                clients_remetente.sobrenome as sobrenome_remetente
                FROM transactions 
                JOIN clients AS clients_destinatario ON transactions.id_conta_recebe = clients_destinatario.id 
                JOIN clients AS clients_remetente ON transactions.id_conta = clients_remetente.id
                WHERE transactions.id_conta = $user_id OR transactions.id_conta_recebe = $user_id";

                $transactions_result = mysqli_query($conn, $transactions_sql);
                
                $count = 1;
                while ($transaction = mysqli_fetch_array($transactions_result)) {
                    echo '<tr>';
                    echo '<td>' . $count . '</td>';
                    echo '<td>';
                    if ($transaction['id_conta'] == $user_id) {
                        echo '<i class="fas fa-arrow-up text-danger"></i> Transferência';
                    } else if ($transaction['id_conta_recebe'] == $user_id) {
                        echo '<i class="fas fa-arrow-down text-success"></i> Recebimento';
                    }
                    echo '</td>';
                    echo '<td>';
                    if ($transaction['id_conta_recebe'] == $user_id) {
                        echo  $transaction['nome_remetente'] . ' ' . $transaction['sobrenome_remetente'];
                    }else{
                        echo $transaction['nome_destinatario'].' '.$transaction['sobrenome_destinatario'];
                    }
                    echo '</td>';
                    echo '<td>' . 'R$'. number_format($transaction['valor'], 2, ',', '.') . '</td>';
                    echo '<td>' . $transaction['data_transacao'] . '</td>';
                    echo '</tr>';
                    $count++;
                }
            ?>
        </tbody>
    </table>
</div>

</body>
<?php }
include("./blades/fim.php");
?>