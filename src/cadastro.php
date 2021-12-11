<?php include "autentica.php" ?>
<html>

<head>
    <title>Cadastro - Dipolo</title>
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->

    <?php
    ob_start();
    include 'navbar.php';
    echo ob_get_clean();
    ?>

    <!-- Conteúdo -->

    <div class="container-flex p-5 py-5">
        <div class="row justify-content-evenly">

            <!-- Coluna com formulário de cadastro -->

            <div class="col-5">
                <h1 class="text-center mb-4">Cadastrar</h1>
                <form action="recebe_cadastro.php" method="POST">
                    <input type="hidden" name="login" value="cadastrar">
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="cadastrarInputNickname" class="form-label">Nickname</label>
                            <input type="text" class="form-control" id="cadastrarInputNickname" name="nickname" size="10" maxlength="10" placeholder="User" required>
                        </div>
                        <div class="col">
                            <label for="cadastrarInputNome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="cadastrarInputNome" name="nome" size="30" pattern="\D+\s\w+" maxlength="100" placeholder="Usuário Teste" required>
                        </div>
                        <div class="col-4">
                            <label for="cadastrarInputDataNasc" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control" id="cadastrarInputDataNasc" name="datanasc" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="cadastrarInputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="cadastrarInputEmail" name="email" size="30" maxlength="35" placeholder="usuario@exemplo.com" required>
                        </div>
                        <div class="col">
                            <label for="cadastrarInputConfEmail" class="form-label">Confirmar email</label>
                            <input type="email" class="form-control" id="cadastrarInputConfEmail" name="confemail" size="30" maxlength="35" placeholder="usuario@exemplo.com" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="cadastrarInputSenha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="cadastrarInputSenha" name="senha" minlength="5" maxlength="12" placeholder="******" required>
                        </div>
                        <div class="col">
                            <label for="cadastrarInputConfSenha" class="form-label">Confirmar senha</label>
                            <input type="password" class="form-control" id="cadastrarInputConfSenha" name="confsenha" minlength="5" maxlength="12" placeholder="******" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cadastrarInputAdm" class="form-label">Código de administrador</label>
                        <input type="password" class="form-control" id="cadastrarInputAdm" name="codadm" aria-describedby="senhaAviso">
                        <div id="senhaAviso" class="form-text">
                            Se for um administrador, insira seu código
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php include 'footer.html'; ?>

</body>

</html>
