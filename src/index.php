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
                            <a class="btn btn-outline-primary btn-lg" href="login.php" role="button">Entrar</a>
                            <a class="btn btn-primary btn-lg ms-3" href="cadastro.php" role="button">Cadastrar</a>
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