<?php include "autentica.php"; ?>

<html>

<head>
    <title>Página inicial</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navbar -->

    <?php
    ob_start();
    include 'navbar.php';
    echo ob_get_clean();
    ?>

    <!-- Conteúdo -->

    <div class="container-flex p-5 py-5">
        <div class="container-flex pb-2">
            <?php if (!$_SESSION["fez_login"]) : ?>
                <div class="row">
                    <div class="col">
                        <h1 class="fw-boldest mb-4 display-3">Dipolo</h1>
                        <p class="fs-4">
                            Entre, debata, socialize,<br>
                            e evolua!
                        </p>
                        <div class="my-5">
                            <!-- Botão de entrar que ativa um modal -->
                            <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#entrarModal">
                                Entrar
                            </button>

                            <!-- Modal de autenticação -->
                            <div class="modal fade" id="entrarModal" tabindex="-1" aria-labelledby="entrarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="entrarModalLabel">Entrar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="efetuar_login.php" method="POST">
                                                <div class="mb-3">
                                                    <label for="entrarModalInputNickname" class="form-label">Nickname</label>
                                                    <input type="text" class="form-control" id="entrarModalInputNickname" name="nickname" size="11" maxlength="10" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="entrarModalInputPassword" class="form-label">Senha</label>
                                                    <input type="password" class="form-control" id="entrarModalInputPassword" name="senha" size="15" maxlength="12" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão de cadastro que leva a uma outra página -->
                            <a class="btn btn-primary btn-lg ms-3" href="login_cadastro.php" role="button">Cadastrar</a>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            <?php else : ?>
                <div>
                    <strong>Exibir Meus Dados</strong></p>
                    <form action="recebe_dados.php" method="POST">
                        <input type="hidden" name="login" value="exibir">
                        <input type="hidden" name="nick" value="<?php echo $_SESSION["nickname"] ?>">
                        <p><input type="submit" value="Exibir"></p>
                    </form>
                    <p><a href="logout.php">LOGOUT</a></p>
                    <br><br>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->

    <?php echo file_get_contents('footer.html') ?>

</body>

</html>