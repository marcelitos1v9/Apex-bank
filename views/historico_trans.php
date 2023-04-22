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
                    <th scope="col">Data</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $transactions_sql = "SELECT transactions.*, clients.nome AS nome_destinatario 
                    FROM transactions 
                    JOIN clients ON transactions.id_conta_recebe = clients.id 
                    WHERE transactions.id_conta = $user_id";

                    $transactions_result = mysqli_query($conn, $transactions_sql);
                    

                    $count = 1;
                    while ($transaction = mysqli_fetch_array($transactions_result)) {
                        echo '<tr>';
                        echo '<td>' . $count . '</td>';
                        echo '<td>' . $transaction['data_transacao'] . '</td>';
                        echo '<td>' . $transaction['nome_destinatario'] . '</td>';
                        echo '<td>' . 'R$'. number_format($transaction['valor'], 2, ',', '.') . '</td>';
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