<?php
include "autentica.php";
include "return_dados.php";

$cod_usuario = $_GET["cod_usuario"];
?>

<html>

<head>
    <title>Editar dados - Dipolo</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
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

    <div class="container-flex p-5 py-4">
        <div class="container-flex pb-2">
            <?php if ($_SESSION["fez_login"]) : ?>
                <div class="row justify-content-evenly px-4">
                    <div class="col-2 py-4">
                        <div class="w-100 text-center">
                            <img src="<?php echo return_dados("caminho_img", "") ?>" class="img-thumbnail w-75" alt="Foto de perfil">
                        </div>
                        <p class="text-center fs-4 mb-0">
                            <?php echo return_dados("nickname", ""); ?>
                        </p>
                        <p class="text-center fw-light text-muted"><?php echo return_dados("nome", ""); ?></p>
                        <!--
                            <form action="recebe_dados.php" method="POST">
                                <input type="hidden" name="login" value="exibir">
                                <input type="hidden" name="nick" value="<?php echo $_SESSION["nickname"] ?>">
                                <p><input type="submit" value="Exibir"></p>
                            </form>
                            <p><a href="logout.php">Logout</a></p>
                            <br><br>
                            -->
                    </div>
                    <div class="col-6">
                        <h1 class="text-center mb-4">Editar dados da conta</h1>

                        <div class="mb-3 border-bottom">
                            <form action="recebe_imagem.php" id="alteracaoFormImagem" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="imagem" value="adicionar">
                                <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario; ?>">

                                <div class="mb-3">
                                    <label for="alteracaoInputImagem" class="form-label">Escolha uma imagem</label>
                                    <input type="file" id="alteracaoInputImagem" class="form-control" name="img_perfil" required>
                                </div>
                            </form>
                            <div class="row pb-2">
                                <div class="col-auto me-auto">
                                    <button type="submit" class="btn btn-primary" form="alteracaoFormImagem">Enviar</button>
                                </div>
                                <div class="col-auto">
                                    <form action="recebe_imagem.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="imagem" value="remover">
                                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">
                                        <button type="submit" class="btn btn-danger">Remover imagem de perfil</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <form action="recebe_alteracao.php" method="POST">
                            <input type="hidden" name="login" value="alterar">
                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">

                            <div class="mb-3">
                                <label for="alteracaoInputNickname" class="form-label">Nickname</label>
                                <input type="text" id="alteracaoInputNickname" class="form-control" name="nickname" size="10" maxlength="10" value="<?php echo return_dados("nickname", ""); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alteracaoInputNome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="alteracaoInputNome" name="nome" size="30" maxlength="100" value="<?php echo return_dados("nome", ""); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alteracaoInputDataNasc" class="form-label">Data de Nascimento</label>
                                <input type="date" id="alteracaoInputDataNasc" class="form-control" name="datanasc" value="<?php echo return_dados("datanasc", ""); ?>" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="alteracaoInputEmail" class="form-label">Email</label>
                                    <input type="text" id="alteracaoInputEmail" class="form-control" name="email" size="30" maxlength="35" value="<?php echo return_dados("email", ""); ?>" required>
                                </div>
                                <div class="col">
                                    <label for="alteracaoInputConfEmail" class="form-label">
                                        <span class="text-danger">*</span>Confirmar Email
                                    </label>
                                    <input type="text" id="alteracaoInputConfEmail" class="form-control" name="confemail" size="30" maxlength="35" required>
                                </div>
                            </div>

                            <div class="text-danger mb-3">(*Campos Obrigatórios)</div>

                            <div class="row justify-content-between">
                                <div class="col-auto me-auto">
                                    <button type="submit" class="btn btn-primary">Confirmar Alterações</button>
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-outline-primary" href="altera_senha.php?cod_usuario=<?php echo return_dados("cod_usuario", ""); ?>">
                                        Alterar senha
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirModalConta">
                                        Excluir conta
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            <?php
            else : header("Location: login_cadastro.php");
            endif;
            ?>
        </div>
    </div>

    <div class="modal fade" id="excluirModalConta" tabindex="-1" aria-labelledby="excluirModalLabelConta" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="excluirModalLabelConta">Confirmar exclusão?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_conta_usuario.php" method="POST">
                        <input type="hidden" name="login" value="exclui_conta">
                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">
                        <button type="submit" class="btn btn-primary">Excluir conta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php include 'footer.html'; ?>

    <body>

</html>