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
                            <a class="nav-link" href="#produtos">Atendimento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sobre-nos">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
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
                    <p class="lead mt-3">Seja bem vindo <?php echo ucfirst($exibe[1])  ?></p>
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
                        <img class="card-img-top rounded-3" src="../img/area_pix.png" alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Pix</h2>
                            <p class="card-text mb-3">Somos um banco comprometido com nossos clientes e buscamos
                                oferecer serviços financeiros de qualidade.</p>
                        </div>
                        <div class="card-footer m-auto">
                            <a href="#" class="btn btn-primary rounded-pill px-4 py-2 ">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card elevate card border-0 rounded-3 ">
                        <div class="card  border-0 rounded-3 ">
                            <img class="card-img-top rounded-3" src="../img/area_pix.png" alt="Imagem do Banco">
                            <div class="card-body text-center">
                                <h2 class="card-title fw-bold mb-3">Pix</h2>
                                <p class="card-text mb-3">Somos um banco comprometido com nossos clientes e buscamos
                                    oferecer serviços financeiros de qualidade.</p>
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
                                <h2 class="card-title fw-bold mb-3">Pix</h2>
                                <p class="card-text mb-3">Somos um banco comprometido com nossos clientes e buscamos
                                    oferecer serviços financeiros de qualidade.</p>
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
                                <h2 class="card-title fw-bold mb-3">Pix</h2>
                                <p class="card-text mb-3">Somos um banco comprometido com nossos clientes e buscamos
                                    oferecer serviços financeiros de qualidade.</p>
                            </div>
                            <div class="card-footer m-auto">
                                <a href="#" class="btn btn-primary rounded-pill px-4 py-2 ">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
<?php } ?>
<?php include("./blades/fim.php") ?>
