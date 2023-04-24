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
            <div class="navbar-nav m-auto">
                <div class="row">
                <a class="nav-link p-2" href="#produtos">Atendimento</a>
                <a class="nav-link p-2" href="#sobre-nos">Sobre Nós</a>
                <a class="nav-link p-2" href="#emprestimos">Empréstimos</a>
                <a class="nav-link p-2" href="#contato">Contato</a>
                <a class="nav-link p-2" href="../controllers/logout.php">Sair</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid text-light p-6 mt-3" style="background: rgb(5,1,70);
background: linear-gradient(90deg, rgba(5,1,70,1) 0%, rgba(95,26,181,1) 50%, rgba(5,1,70,1) 100%);">
            <div class="container text-center">
                <h1 class="display-4">Apex Bank</h1>
                <h3 class="lead mt-3">Seja bem vindo <?php echo ucfirst($exibe[1])  ?></h3>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center mb-4">Dia a dia</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-3 elevate">
                <div class="card  border-0 rounded-3 ">
                    <div class="card-top d-flex justify-content-center" style="background-color:#5F1AB5" src="" alt="Imagem do Banco">
                        <i class="fa-solid fa-5x p-3  fa-piggy-bank" style="color: #aaaaaa;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title fw-bold mb-3">Saldo bancario</h2>
                        <hr>
                        <div class="mt-4">
                        <h3 class="mt-5">Seu saldo é de R$<?php echo number_format($exibe["saldo"], 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                    <div class="card-footer m-auto">
                        <a href="./pix.php" class="btn btn-primary rounded-pill px-4 py-2 ">Transferir</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card elevate card border-0 rounded-3 ">
                    <div class="card  border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="../img/area_pix.png" alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Deposito</h2>
                            <hr>
                            <div class="mt-4">
                                <h4 class="card-text ">Aqui você pode depositar e o seu dinheiro cai na hora</h4>
                            </div>
                        </div>
                        <div class="card-footer m-auto">
                            <a href="./deposito.php" class="btn btn-primary rounded-pill px-4 py-2 ">Depositar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card elevate card border-0 rounded-3 ">
                    <div class="card  border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="../img/area_pix.png" alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Pix</h2>
                            <hr>
                            <div class="mt-4">
                                <h4 class="card-text ">Aqui você pode depositar e o seu dinheiro cai na hora</h4>
                            </div>
                        </div>
                        <div class="card-footer m-auto">
                            <a href="#" class="btn btn-primary rounded-pill px-4 py-2 ">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card elevate card border-0 rounded-3 ">
                    <div class="card  border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="../img/area_pix.png" alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Historico de transferência</h2>
                            <hr>
                            <div class="mt-4">
                                <h4 class="card-text ">Aqui você pode depositar e o seu dinheiro cai na hora</h4>
                            </div>
                        </div>
                        <div class="card-footer m-auto">
                            <a href="./historico_trans.php" class="btn btn-primary rounded-pill px-4 py-2 ">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <section id="emprestimos">
            <h2 class="text-center mb-4 mt-4">Simulador de Empréstimos</h2>
        <form action="../controllers/simulador.php" method="post">
        <div class="form-group">
            <label for="valor">Valor do empréstimo:</label>
            <input type="number" name="valor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="parcelas">Número de parcelas:</label>
            <select name="parcelas" class="form-control" required>
            <option value="12">12</option>
            <option value="24">24</option>
            <option value="36">36</option>
            <option value="48">48</option>
            </select>
        </div> -->
        <!-- <div class="form-group">
            <label for="juros">Taxa de juros (% ao mês):</label>
            <input type="number" name="juros" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simular</button>
        </form>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6 offset-lg-3">
                
            </div>
        </div> -->
    </div>   
</body>
<?php } ?>
<?php include("./blades/fim.php") ?>