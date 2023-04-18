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
                <p class="lead mt-3"><?php echo ucfirst($exibe[1]) ?> essa é a area pix, aqui você consegue transferir gratuitamente para outras contas</p>
            </div>
        </div>
    </header>

    <div class="mt-3 container">
        <div class="text-center">
        <h2>Busque aqui o usuario que deseja transferir</h2>
        </div>
    </div>

</body>
<?php } ?>
<?php include("./blades/fim.php") ?>