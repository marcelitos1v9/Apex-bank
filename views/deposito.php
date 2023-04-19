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
                <a class="nav-link p-2" href="./inicial_user.php">Voltar</a>
                <a class="nav-link p-2" href="../controllers/logout.php">Sair</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid text-light p-6 mt-3" style="background: rgb(5,1,70);
background: linear-gradient(90deg, rgba(5,1,70,1) 0%, rgba(95,26,181,1) 50%, rgba(5,1,70,1) 100%);">
            <div class="container text-center">
                <h1 class="display-4">Apex Bank</h1>
                <p class="lead mt-3"><?php echo ucfirst($exibe[1]) ?> Aqui você pode depositar o valor que quiser e seu
                    dinheiro cai na hora!</p>
                    <h3 class="mt-5">Seu saldo é de R$<?php echo number_format($exibe["saldo"], 2, ',', '.'); ?></h3>
            </div>
        </div>
    </header>

    <div class="mt-3 container">
            <?php
            if(isset($_GET["sucesso"])){
              echo "<div class='alert alert-success alert-dismissible fade show col-8 m-auto mb-2' role='alert'>
              <strong>Creditado com sucesso</strong>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
            }
            ?>
        <div class="text-center mt-3">
            <h2>Quanto você quer depositar hoje?</h2>
        </div>
        <form action="../controllers/depositar.php" class="" method="post">
            <div class="d-flex justify-content-center mt-3">
                <input type="number" name="deposito_valor" class="form-control col-8">
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary col-4">Depositar</button>
            </div>
        </form>
    </div>

</body>
<?php } ?>
<?php include("./blades/fim.php") ?>