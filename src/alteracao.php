<?php
include "autentica.inc";
include "conecta_mysql.inc";

$cod_usuario = $_GET["cod_usuario"];

$sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
$resposta = mysqli_query($mysqli, $sql);
$usuario = mysqli_fetch_array($resposta);
?>

<html>

<head>
    <title>Alterar Usuário</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar d-block navbar-dark bg-azul">
        <div class="d-flex">
            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">Página principal</a></li>
                <li><a class="dropdown-item" href="#">Entrar / Cadastrar</a></li>
                <li><a class="dropdown-item" href="#">Ajuda</a></li>
                <li><a class="dropdown-item" href="#">Enviar feedback</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sobre</a></li>
            </ul>
            <a class="navbar-brand ms-2" style="font-weight: 500;" href="#">Dipolo</a>
            <form class="d-flex ms-auto my-2 my-lg-0 me-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <p><strong>Atualização de Dados</strong></p>
    <form action="recebe_dados.php" method="POST">
        <input type="hidden" name="login" value="alterar">
        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">

        <p>Nickname: <input type="text" name="nickname" size="10" maxlength="10" value="<?php echo $usuario["nickname"] ?>" required></p>

        <p>Nome Completo: <input type="text" name="nome" size="30" maxlength="100" value="<?php echo $usuario["nome"] ?>" required></p>

        <p>Data de Nascimento: <input type="date" name="datanasc" value="<?php echo $usuario["datanasc"] ?>" required></p>

        <p>Email: <input type="text" name="email" size="30" maxlength="35" value="<?php echo $usuario["email"] ?>" required></p>

        <p>*Confirmar Email: <input type="text" name="confemail" size="30" maxlength="35" required></p>

        <p>*Senha Atual: <input type="password" name="senha_atual" maxlength="12"></p>

        <p>Nova Senha: <input type="password" name="senha_nova" maxlength="12"></p>

        <p>Confirmar Senha Nova: <input type="password" name="conf_senhanova" maxlength="12"></p>

        <p>Se for um administrador, insira novamente seu código <br>
            *Código de Administrador: <input type="password" name="codadm"></p>

        <p>(*Campos Obrigatórios)</p>

        <p><input type="submit" value="Confirmar Alterações"></p>
        <br><a href='index.php'> Voltar para tela inicial </a>
    </form>

    <!-- Footer -->

    <footer class="bg-azul text-light">
        <div class="container-fluid text-md-left pt-4">
            <div class="row justify-content-start mb-3">
                <div class="col-md-2 mt-md-0 mt-n2">
                    <a class="text-light text-decoration-none fs-1 ms-4" style="font-weight: 600;" href="index.php">Dipolo</a>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-2 mb-md-0 mb-3 pt-3">
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-light text-decoration-none" href="index.php">Página Principal</a>
                        </li>
                        <li>
                            <a class="text-light text-decoration-none" href="#!">Ajuda</a>
                        </li>
                        <li>
                            <a class="text-light text-decoration-none" href="#!">Sobre</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mb-md-0 mb-3 pt-3">
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-light text-decoration-none" href="#!">Enviar Feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-3">
            <a>Dipolo Corporation © 2021</a>
        </div>
    </footer>

    <body>

</html>