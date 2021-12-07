<?php
include "autentica.php";
include "return_dados.php";
include "conecta_mysql.php";

$cod_comentario = $_GET["cod_comentario"];

$sql ="SELECT * FROM comentarios WHERE cod_comentario = $cod_comentario;"; 
$resposta = mysqli_query($mysqli,$sql);
$comentario = mysqli_fetch_array($resposta);

$texto_coment = $comentario["texto_coment"];
?>

<html>

    <head>
        <title>Editar Comentário</title>
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
                            <div class="figure-img img-fluid rounded bg-azul text-light">
                                <img src="<?php echo $usuario['caminho_img'] ?>" alt="Foto de perfil" width="210" height="160">
                            </div>                            <p class="text-center fs-4 mb-0">
                                <?php echo return_dados("nickname", ""); ?>
                            </p>
                            <p class="text-center fw-light text-muted"><?php echo return_dados("nome", ""); ?></p>
                            <p class="">Bio (A ser implementada)</p>
                            <div class="pb-5"></div>
                            <div class="pb-1 my-3 bg-azul"></div>
                            <p class="mb-1">Local (WIP)</p>
                            <p>Interesses (WIP)</p>
                        </div>
                        <div class="col-6">
                            <h1 class="text-center mb-4">Editar postagem</h1>
                            <form action="recebe_alteracao.php" method="POST">
                                <input type="hidden" name="login" value="alterar_comentario">
                                <input type="hidden" name="cod_comentario" value="<?php echo $cod_comentario ?>">

                                <div class="mb-3">
                                    <!--Criar uma label pra editar o texto do comentário-->
                                    <label for="alteracaoInputNickname" class="form-label">
                                        <span class="text-danger">*</span>Comentário</label>

                                    <!--<textarea class="form-control mb-3" name="texto_post" rows="5" 
                                    maxlength="350" value="<//?php echo $texto_post ?>" required></textarea>-->
                                    <input type="textarea" id="alteracaoInputNickname" class="form-control mb-3" 
                                    name="texto_coment" maxlength="350" value="<?php echo $texto_coment ?>" required>

                                </div>

                                <div class="text-danger mb-3">(*Campos Obrigatórios)</div>

                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Confirmar Alterações</button>
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

        <!-- Footer -->
        <?php include 'footer.html'; ?>

    <body>

</html>