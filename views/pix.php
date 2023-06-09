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
                <p class="lead mt-3"><?php echo ucfirst($exibe["nome"]) ?> essa é a area pix, aqui você consegue
                    transferir gratuitamente para outras contas</p>
                <h3 class="mt-5">Seu saldo é de R$<?php echo number_format($exibe["saldo"], 2, ',', '.'); ?></h3>
            </div>
        </div>
    </header>
    <div class="mt-3 container">
        <div class="text-center">
            <h2>Busque aqui o usuário que deseja transferir</h2>
        </div>
        <form method="GET" action="./pix.php">
            <div class="d-flex justify-content-center mt-3">
                <input type="text" class="form-control col-8" name="Nome_pesquisa"
                    placeholder="Nome do usuário que deseja pesquisar" id="">
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <?php
@$varBusca = $_GET["Nome_pesquisa"];

if (!empty($varBusca)) {
    $query = mysqli_query($conn, "SELECT * FROM clients WHERE nome LIKE '%$varBusca%'");
    if(mysqli_num_rows($query) == 0) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Nenhum usuario encontrado:</strong> Verifique se o nome está correto!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    } else {
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
            $telefone = substr($exibe1['telefone'],-4);
            echo "<tr>
                    <td>{$exibe1['nome']} {$exibe1['sobrenome']}</td>
                    <td>**{$telefone}</td>
                    <td><a href='./valor_transferencia.php?id={$exibe1['id']}' class='btn btn-sm btn-success'>Fazer transferência</a></td>
                </tr>";
        }
        echo "</tbody>
            </table>
        </div>";
    }
}
}
?>
    </div>
</body>
<?php 
include("./blades/fim.php");
?>