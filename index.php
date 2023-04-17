<?php include("./models/conexao.php") ?>
<?php include("./views/blades/header.php") ?>

<body>
    <!-- Seção do cabeçalho -->
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Usuario</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./views/login.php">Login</a>
                            <a class="dropdown-item" href="#">Cadastrar</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid text-light" style="background: rgb(5,1,70);
background: linear-gradient(90deg, rgba(5,1,70,1) 0%, rgba(95,26,181,1) 50%, rgba(5,1,70,1) 100%);">
            <div class="container text-center">
                <h1 class="display-4">Apex Bank</h1>
                <p class="lead">Sua melhor opção em serviços financeiros</p>
                <a href="#" class="btn btn-outline-light btn-lg  rounded-pill">Saiba mais</a>
            </div>
        </div>
    </header>
    <!-- Seção de produtos -->
    <section id="produtos" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center mb-4">Atendimento Rápido</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3 elevate">
                    <div class="card  border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="./img/area_pix.png" alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Banco Criativo</h2>
                            <p class="card-text mb-4">Somos um banco comprometido com nossos clientes e buscamos
                                oferecer serviços financeiros de qualidade.</p>
                            <a href="#" class="btn btn-primary rounded-pill px-4 py-2">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card elevate card border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="https://via.placeholder.com/350x150"
                            alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Banco Criativo</h2>
                            <p class="card-text mb-4">Somos um banco comprometido com nossos clientes e buscamos
                                oferecer serviços financeiros de qualidade.</p>
                            <a href="#" class="btn btn-primary rounded-pill px-4 py-2">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card elevate border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="https://via.placeholder.com/350x150"
                            alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Banco Criativo</h2>
                            <p class="card-text mb-4">Somos um banco comprometido com nossos clientes e buscamos
                                oferecer serviços financeiros de qualidade.</p>
                            <a href="#" class="btn btn-primary rounded-pill px-4 py-2">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card elevate border-0 rounded-3 ">
                        <img class="card-img-top rounded-3" src="https://via.placeholder.com/350x150"
                            alt="Imagem do Banco">
                        <div class="card-body text-center">
                            <h2 class="card-title fw-bold mb-3">Banco Criativo</h2>
                            <p class="card-text mb-4">Somos um banco comprometido com nossos clientes e buscamos
                                oferecer serviços financeiros de qualidade.</p>
                            <a href="#" class="btn btn-primary rounded-pill px-4 py-2">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Seção sobre nós -->
    <section id="sobre-nos" class="bg-light p-3">
        <div class="container mb-3">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h2 class="text-center mb-4">Sobre Nós</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <img src="img\Apex_bank_logo.png" alt="Imagem sobre nós" class="img-fluid rounded-circle">
                </div>
                <div class="col-md-6 m-auto">
                    <p class="lead">O Apex Bank é um banco que nasceu com o objetivo de oferecer as melhores soluções
                        financeiras para seus clientes. Fundado em 2010, o banco já se tornou referência no mercado e
                        conta com uma equipe de profissionais altamente capacitados.</p>
                    <p>Aqui, acreditamos que cada cliente é único e, por isso, oferecemos um atendimento personalizado e
                        de qualidade, buscando sempre entender suas necessidades e encontrar a melhor solução para cada
                        caso.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Seção de contato -->
    <section id="contato">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center mb-4">Contato</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="" method="post" id="form-contato">
                        <div class="form-floating">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" id="telefone" name="telefone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mensagem">Mensagem:</label>
                            <textarea id="mensagem" name="mensagem" class="form-control" required></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary col-4">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Seção do rodapé -->
    <footer class="footer  bg-dark text-light p-3 mt-3">
        <div class="container ">
            <div class="text-center">
                <ul class="list-inline social-icons">
                    <li class="list-inline-item">
                        <a href="https://github.com/marcelitos1v9" target="_blank">
                            <i class="fa-brands fa-github fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/marceloaugusto_oo/" target="_blank">
                            <i class="fa-brands fa-instagram fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="mailto:marceloaugustocge@gmail.com" target="_blank">
                            <i class="fa-solid fa-envelope fa-2x"></i>
                        </a>
                    </li>
                </ul>
                <div>
                    <p>&copy; Marcelo Augusto 2023 Todos os direitos reservados</p>
                </div>
            </div>
        </div>
    </footer>
    <?php include("./views/blades/fim.php")?>