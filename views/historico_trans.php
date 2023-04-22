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
                <p class="lead mt-3"><?php echo ucfirst($exibe["nome"]) ?> essa e seu historico de transações</p>
            </div>
        </div>
    </header>
    <?php
    echo "<div class='table-responsive'>
    <table class='table table-striped table-hover mt-3'>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>";
        while ($exibe1 = mysqli_fetch_array($query)) {
        $telefone = substr($exibe1['telefone'], -4);
        echo "<tr>
                <td>{$exibe1['nome']} {$exibe1['sobrenome']}</td>
                <td>****{$telefone}</td>
                <td><a href='./valor_transferencia.php?id={$exibe1['id']}' class='btn btn-sm btn-success'>Fazer transferência</a></td>
            </tr>";
        }
        echo "</tbody>
        </table>
        </div>";
                  ?>
</body>
<?php }
include("./blades/fim.php");
?>