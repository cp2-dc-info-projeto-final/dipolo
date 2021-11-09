<?php
include "autentica.php";
include "return_dados.php";

$cod_usuario = $_GET["cod_usuario"];
?>

<html>

<head>
    <title>Alterar Usuário</title>
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

    <div class="container-flex p-5 py-4">
        <div class="container-flex pb-2">
            <?php if ($_SESSION["fez_login"]) : ?>
                <div class="row justify-content-evenly px-4">
                    <div class="col-2 py-4">
                        <div class="figure-img img-fluid rounded px-5 py-5 bg-azul text-light">Imagem de perfil (A ser implementada)</div>
                        <p class="text-center fs-4 mb-0">
                            <?php echo return_dados("nickname"); ?>
                        </p>
                        <p class="text-center fw-light text-muted"><?php echo return_dados("nome"); ?></p>
                        <p class="">Bio (A ser implementada)</p>
                        <div class="pb-5"></div>
                        <div class="pb-1 my-3 bg-azul"></div>
                        <p class="mb-1">Local (WIP)</p>
                        <p>Interesses (WIP)</p>
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
                        <form action="recebe_alteracao.php" method="POST">
                            <input type="hidden" name="login" value="alterar_senha">
                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">

                            <div class="mb-3">
                                <label for="alteracaoInputSenhaAtual" class="form-label">
                                    <span class="text-danger">*</span>Senha Atual
                                </label>
                                <input type="password" id="alteracaoInputSenhaAtual" class="form-control" name="senha_atual" maxlength="12">
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <span class="text-danger">*</span>Nova Senha
                                    <input type="password" id="alteracaoInputSenhaNova" class="form-control" name="senha_nova" maxlength="12">
                                </div>
                                <div class="col">
                                    <span class="text-danger">*</span>Confirmar Nova Senha
                                    <input type="password" id="alteracaoInputConfSenhaNova" class="form-control" name="conf_senhanova" maxlength="12">
                                </div>
                            </div>

                            <div class="text-danger mb-3">(*Campos Obrigatórios)</div>

                            <button type="submit" class="btn btn-primary">Confirmar Alterações</button>
                        </form>
                    </div>
                </div>
            <?php
            else : header("Location: login_cadastro.php");
            endif;
            ?>
        </div>
    </div>

    <!-- Footer -->

    <?php echo file_get_contents('footer.html') ?>

    <body>

</html>
