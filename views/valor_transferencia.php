<?php 
session_start();
include("../models/conexao.php"); 
include("./blades/header.php");

if (!isset($_SESSION['user_id'])) { 
    header('Location: ./login.php'); 
    exit; 
} 

$user_id = $_SESSION['user_id']; 

if(isset($_GET['id'])) {
    $destinatario_id = $_GET['id'];
    $sql_destinatario = "SELECT * FROM clients WHERE id = $destinatario_id"; 
    $result_destinatario = mysqli_query($conn, $sql_destinatario);
    $exibe_destinatario = mysqli_fetch_array($result_destinatario);
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
                    <a class="nav-link p-2" href="./pix.php">Voltar</a>
                    <a class="nav-link p-2" href="../controllers/logout.php">Sair</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid text-light p-6 mt-3" style="background: rgb(5,1,70);
            background: linear-gradient(90deg, rgba(5,1,70,1) 0%, rgba(95,26,181,1) 50%, rgba(5,1,70,1) 100%);">
            <div class="container text-center">
                <h1 class="display-4">Apex Bank</h1>
                <p class="lead mt-3"><?php echo ucfirst($exibe["nome"]) ?> essa é a area pix, aqui você consegue
                    transferir gratuitamente para outras contas</p>
                <h3 class="mt-5">Seu saldo é de R$<?php echo number_format($exibe["saldo"], 2, ',', '.'); ?></h3>
            </div>
        </div>
    </header>
    <div class="mt-3 container">
        <div class="text-center">
            <h2>Transferência para <?php echo $exibe_destinatario['nome'] . ' ' . $exibe_destinatario['sobrenome']; ?></h2>
        </div>
        <form method="POST" action="../controllers/transferencia.php">
            <div class="d-flex justify-content-center mt-3">
                <input type="hidden" name="destinatario_id" value="<?php echo $destinatario_id; ?>">
                <input type="number" class="form-control col-8" name="valor_transferencia"
                    placeholder="Digite o valor que deseja transferir" id="" step="0.01" min="0.01" max="<?php echo $exibe['saldo']; ?>" required>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">Transferir</button>
            </div>
        </form>
    </div>
</body>
<?php 
}
include("./blades/fim.php");
?>