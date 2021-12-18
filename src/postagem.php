<?php include "autentica.php"; ?>
<?php include "return_dados.php"; ?>
<?php include "conecta_mysql.php"; ?>
<?php
include "return_postagem.php";
$postagem = return_postagem($_GET['cod_postagem'], $mysqli);

include "return_usuario.php";
$usuario_postagem = return_usuario($postagem['cod_usuario'], $mysqli);
?>
<?php include "verificar_curtida.php"; ?>
<?php include "existe.php"; ?>

<html>

<head>
    <title>Postagem - Dipolo</title>
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
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

    <div class="container-flex p-5">
        <div class="container-flex">
            <?php if (postagem_existe($_GET['cod_postagem'], $mysqli)) : ?>
                <div class="row justify-content-center px-4 align-items-bottom">
                    <div class="col-2 ps-5">
                        <div class="ps-5">
                            <div class="ps-4">
                                <div class="w-100 text-center">
                                    <img src="<?php echo $usuario_postagem["caminho_img"] ?>" class="img-thumbnail w-100" alt="Foto de perfil">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="row mx-0">
                            <div class="p-3 border-bottom border-dark">
                                <div class="row me-0">
                                    <p class="pe-0 text-break">
                                        <?php echo $postagem["texto_post"]; ?>
                                    </p>
                                </div>
                                <div class="row me-0 align-items-center">
                                    <div class="col-auto me-auto">
                                        <p class="mb-0 text-muted fw-light">Postagem inicial feita por <a href="timeline.php?nickname=<?php echo $usuario_postagem["nickname"] ?>" class="fw-bold text-decoration-none text-muted"><?php echo $usuario_postagem["nickname"]; ?></a></p>
                                    </div>
                                    <div class="col-auto px-1">
                                        <a href="curtidas_postagens.php?cod_postagem=<?php echo $_GET["cod_postagem"]; ?>" class="btn btn-lg px-2" aria-label="Curtir postagem">
                                            <?php if (usuario_curtiu_postagem($postagem["cod_postagem"], $_SESSION["cod_usuario"])) : ?>
                                                <i class="bi bi-hand-thumbs-up-fill text-primary"></i>
                                            <?php else : ?>
                                                <i class="bi bi-hand-thumbs-up"></i>
                                            <?php endif; ?>
                                        </a>
                                        <span><?php echo return_curtidas($postagem["cod_postagem"]); ?></span>
                                    </div>
                                    <?php if ($usuario_postagem["nickname"] == $_SESSION["nickname"]) : ?>
                                        <div class="col-auto px-1">
                                            <button class="btn btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#editar<?php echo $postagem['cod_postagem'] ?>Modal">
                                                <i class="bi bi-gear" aria-label="Editar postagem"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($usuario_postagem["nickname"] == $_SESSION["nickname"] || $usuario["adm"]) : ?>
                                        <div class="col-auto px-1">
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirPostagem<?php echo $postagem['cod_postagem']; ?>Modal" aria-label="Excluir postagem">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editar<?php echo $postagem['cod_postagem'] ?>Modal" tabindex="-1" aria-labelledby="editar<?php echo $postagem['cod_postagem'] ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editar<?php echo $postagem['cod_postagem'] ?>ModalLabel">Editar postagem</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="recebe_alteracao.php" method="POST">
                                            <input type="hidden" name="login" value="alterar_postagem">
                                            <input type="hidden" name="cod_postagem" value="<?php echo $postagem['cod_postagem'] ?>">
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label for="editar<?php echo $postagem['cod_postagem'] ?>ModalInputTextoPost" class="form-label">Postagem</label>
                                                    <textarea class="form-control mb-3" name="texto_post" rows="5" maxlength="350"><?php echo $postagem['texto_post'] ?></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Editar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="excluirPostagem<?php echo $postagem['cod_postagem']; ?>Modal" tabindex="-1" aria-labelledby="excluirPostagem<?php echo $postagem['cod_postagem']; ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="excluirPostagem<?php echo $postagem['cod_postagem']; ?>ModalLabel">Excluir postagem</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="excluir_postagem.php" method="POST">
                                            <input type="hidden" name="cod_postagem" value="<?php echo $postagem['cod_postagem'] ?>">
                                            <button type="submit" class="btn btn-primary">
                                                Excluir postagem
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center px-4 align-items-bottom mt-3">
                    <div class="col-2"></div>
                    <div class="col-7">
                        <h4 class="mb-4">Comentários</h4>
                    </div>
                </div>

                <?php
                include "listar.php";
                listar_comentarios($postagem["cod_postagem"], $mysqli);
                ?>

                <div class="row justify-content-center px-4 align-items-bottom mt-3 border-top mx-auto pt-4">
                    <div class="col-3">
                        <h5>Comente!</h5>
                        <p>
                            Os comentários são essenciais para a discussão.
                            Você pode usá-los para pontuar algo importante,
                            falar de seus argumentos ou até mesmo demonstrar invalidade
                            no argumento de algum usuário participante!
                        </p>
                    </div>
                    <div class="col-7">
                        <form action="recebe_comentario.php" method="POST">
                            <input type="hidden" name="cod_usuario" value="<?php echo $_SESSION["cod_usuario"]; ?>">
                            <input type="hidden" name="cod_postagem" value="<?php echo $postagem["cod_postagem"]; ?>">
                            <textarea class="form-control mb-3" name="texto_coment" rows="7" maxlength="750" placeholder="Comente aqui..." required></textarea>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary btn-lg">
                                        Criar comentário
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <p>Essa postagem não existe (ou não existe mais...)</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->

    <?php include 'footer.html'; ?>

</body>

</html>