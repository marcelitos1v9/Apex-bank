<?php include("../models/conexao.php") ?>
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

<body class="pb-5">
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="d-flex justify-content-center">
                        <img src="../img/leao_logo_1.png" alt="">
                    </div>
                    <h2 class="text-center mb-4">Cadastre-se e desfrute</h2>
                    <?php
                    if(isset($_GET["email_cadastrado"])){
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Email ja cadastrado</strong> Tente fazer o login com sua conta
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                        }
                    ?>
                    <?php
                    if(isset($_GET["cpf_cadastrado"])){
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Cpf ja cadastrado</strong> Tente fazer o login com sua conta
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                        }
                    ?>
                    <form action="../controllers/cadastro.php" method="post">
                        <div class="form-group required">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome_cadastro" id="nome"
                                placeholder="Digite seu Nome">
                        </div>
                        <div class="form-group required">
                            <label for="cpf">Endereço</label>
                            <input type="text" class="form-control" name="cpf_cadastro" id="cpf"
                                placeholder="Digite seu cpf">
                        </div>
                        <div class="form-group required">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco_cadastro" id="enedereco"
                                placeholder="Digite seu telefone">
                        </div>
                        <div class="form-group required">
                            <label for="telefone">Telefone</label>
                            <input type="number" class="form-control" name="tel_cadastro" id="telefone"
                                placeholder="Digite seu telefone">
                        </div>
                        <div class="form-group required">
                            <label for="username">Email</label>
                            <input type="email" class="form-control" name="email_cadastro" id="email"
                                placeholder="Digite seu email">
                        </div>
                        <div class="form-group required">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="senha_cadastro" id="password"
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