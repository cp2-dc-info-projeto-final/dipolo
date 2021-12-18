<?php include "autentica.php"; ?>
<?php include "return_dados.php"; ?>
<?php include "conecta_mysql.php"; ?>

<html>

<head>
    <title>Página inicial - Dipolo</title>
    <link rel="icon" href="../imagens/favicon.png">
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
        <div class="container-flex pb-2">
            <?php if (!$_SESSION["fez_login"]) : ?>
                <div class="row">
                    <div class="col pt-4">
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
                                                    <input type="text" class="form-control" id="entrarModalInputNickname" name="nickname" size="11" maxlength="10" placeholder="User" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="entrarModalInputPassword" class="form-label">Senha</label>
                                                    <input type="password" class="form-control" id="entrarModalInputPassword" name="senha" size="15" maxlength="12" placeholder="******" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão de cadastro que leva a uma outra página -->
                            <a class="btn btn-primary btn-lg ms-3" href="cadastro.php" role="button">Cadastrar</a>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            <?php else : ?>
                <div class="row justify-content-between px-4">

                    <!-- Criar postagem -->
                    <div class="col-7">
                        <div class="border-bottom rounded border-dark pb-1">
                            <form action="recebe_postagem.php" method="POST">
                                <input type="hidden" name="cod_usuario" value="<?php echo return_dados("cod_usuario", "", $mysqli); ?>">
                                <textarea class="form-control mb-3" name="texto_post" rows="5" maxlength="350" placeholder="Comece seu debate aqui" required></textarea>
                                <button type="submit" class="btn btn-outline-primary btn-lg">Criar postagem</button>
                            </form>
                        </div>

                        <div class="mt-3">
                            <h4 class="mb-3">Timeline</h4>
                            <?php
                            include "listar.php";
                            listar_postagens(return_dados("cod_usuario", "", $mysqli), $mysqli);
                            ?>
                        </div>

                    </div>

                    <div class="col-2">
                        <div class="text-center">
                            <img src="<?php echo return_dados("caminho_img", "", $mysqli) ?>" class="img-thumbnail w-75" alt="Foto de perfil">
                        </div>
                        <p class="text-center fs-4 mb-0">
                            <?php echo return_dados("nickname", "", $mysqli); ?>
                            <a class="text-decoration-none text-dark" href="alteracao.php?cod_usuario=<?php echo return_dados("cod_usuario", "", $mysqli); ?>" aria-label="Editar dados">
                                <i aria-hidden="true" class="bi bi-gear" role="img" title="Editar dados"></i>
                            </a>
                            <?php if (return_dados("adm", "", $mysqli)) : ?>
                                <a class="text-decoration-none text-dark" href="admin_dashboard.php" aria-label="Ferramentas de administrador">
                                    <i aria-hidden="true" class="bi bi-tools" role="img" title="Ferramentas de administrador"></i>
                                </a>
                            <?php endif; ?>
                        </p>
                        <p class="text-center fw-light text-muted"><?php echo return_dados("nome", "", $mysqli); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php mysqli_close($mysqli); ?>

    <!-- Footer -->

    <?php include 'footer.html'; ?>

</body>

</html>