<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
    body {
        background: linear-gradient(90deg, rgba(5, 1, 70, 1) 0%, rgba(95, 26, 181, 1) 50%, rgba(5, 1, 70, 1) 100%);
    }

    .card {
        background-color: #fff;
        border: none;
    }

    .card-header {
        background-color: #0077b6;
        color: #fff;
        font-weight: bold;
    }

    .form-control {
        background-color: #f8f9fa;
        border: none;
        border-radius: 0;
        box-shadow: none;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #0077b6;
    }


    .btn-primary {
        border: none;
        background-color: rgba(95, 26, 181, 1)
    }

    .btn-primary:hover {
        background-color: #006298;
        box-shadow: none;
    }

    .btn-primary:focus {
        box-shadow: none;
        outline: none;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    @media (min-width: 576px) {
        .card {
            max-width: 500px;
            margin: 0 auto;
        }
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="d-flex justify-content-center">
                        <img src="../img/leao_logo_1.png" alt="">
                    </div>
                    <h2 class="text-center mb-4">Bem-vindo(a) ao Apex Bank</h2>
                    <?php
            if(isset($_GET["erro"])){
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Usuário inválido</strong> Verifique se o email e senha estão corretos
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
            }
            ?>
                    <form action="../controllers/ver_login.php" method="post">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" class="form-control" name="email" id="username"
                                placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="senha" id="password"
                                placeholder="Digite sua senha">
                        </div>
                        <button type="submit" class="btn mt-3 btn-primary btn-block rounded-pill">Entrar</button>
                    </form>
                    <a href="../" class="btn btn-dark rounded-pill mt-2">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <?php include("./blades/fim.php") ?>