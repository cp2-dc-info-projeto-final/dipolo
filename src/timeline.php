<?php include "autentica.php"; ?>
<?php include "return_dados.php"; ?>
<?php include "existe.php" ?>
<?php include "conecta_mysql.php"; ?>

<html>

<head>
    <title><?php echo $_GET["nickname"]; ?> - Dipolo</title>
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    if ($_GET["nickname"] == $_SESSION["nickname"]) {
        header("Location: index.php");
    }
    ?>

    <!-- Navbar -->

    <?php
    ob_start();
    include 'navbar.php';
    echo ob_get_clean();
    ?>

    <!-- Conteúdo -->

    <div class="container-flex p-5 py-5">
        <div class="container-flex pb-2">
            <?php if (usuario_existe($_GET["nickname"])) : ?>
                <div class="row justify-content-between px-4">

                    <!-- Criar postagem -->
                    <div class="col-7">
                        <h4 class="mb-3">Timeline</h4>
                        <?php
                        include "listar.php";
                        listar_postagens(return_dados("cod_usuario", $_GET["nickname"], $mysqli));
                        ?>
                    </div>

                    <div class="col-2">
                        <div class="w-100 text-center">
                            <img src="<?php echo return_dados("caminho_img", $_GET['nickname'], $mysqli) ?>" class="img-thumbnail w-75" alt="Foto de perfil">
                        </div>
                        <p class="text-center fs-4 mb-0">
                            <?php echo $_GET['nickname']; ?>
                        </p>
                        <p class="text-center fw-light text-muted"><?php echo return_dados("nome", $_GET['nickname'], $mysqli); ?></p>
                    </div>
                </div>
            <?php else : ?>
                <p>Este usuário não existe.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php mysqli_close($mysqli); ?>

    <!-- Footer -->

    <?php include 'footer.html'; ?>

</body>

</html>