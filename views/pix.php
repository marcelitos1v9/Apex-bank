<?php include("../models/conexao.php") ?>
<?php include("./blades/header.php") ?>

<body>
    <?php
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
        <header>

            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="./inicial_user.php">Voltar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controllers/logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="jumbotron jumbotron-fluid text-light p-6 mt-3" style="background: rgb(5,1,70);
background: linear-gradient(90deg, rgba(5,1,70,1) 0%, rgba(95,26,181,1) 50%, rgba(5,1,70,1) 100%);">
                <div class="container text-center">
                    <h1 class="display-4">Apex Bank</h1>
                    <p class="lead mt-3"><?php echo ucfirst($exibe["nome"]) ?> essa é a area pix, aqui você consegue transferir gratuitamente para outras contas</p>
                    <h3 class="mt-5">Seu saldo é de R$<?php echo number_format($exibe["saldo"], 2, ',', '.'); ?></h3>
                </div>
            </div>
        </header>

        <div class="mt-3 container">
            <div class="text-center">
                <h2>Busque aqui o usuario que deseja transferir</h2>
            </div>
            <form action="../views/pix.php">
                <div class="d-flex justify-content-center mt-3">
                    <input type="text" class="form-control col-8" name="Nome_pesquisa" placeholder="Nome do usuario que deseja pesquisar" id="">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" value="buscar"  class="btn btn-primary">pesquisar</button>
                </div>
            </form>
            <?php
            if (empty($_POST["buscar"])) {
                echo "";
            } else {
                $varBusca = $_POST["buscar"];

                echo "<table border='1' width='450'><tr><td>Frase</td><td>Editar</td><td>Excluir</td></tr>";
                
                $query = mysqli_query($conexao, "SELECT * FROM clients WHERE nome LIKE '%$varBusca%'");
                while($exibe1 = mysqli_fetch_array($query)) {
                    echo "<tr>" .
                        "<td>" .$exibe1[1]."</td>" .
                        "<td><a href='views/cadastroAtualiza.php?ida=" . $exibe1[0] . "'>Editar</a></td>" .
                        "<td><a href='controllers/deletarAluno.php?ida=" . $exibe1[0] . "'>Excluir</a></td>" .
                        "</tr>";
                }

                echo "</table>";
            }
            ?>
        </div>

</body>
<?php } ?>
<?php include("./blades/fim.php") ?>