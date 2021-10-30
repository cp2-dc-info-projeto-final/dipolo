<html>

<head>
    <title>Login</title>
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
        <div class="row justify-content-between">
            <div class="col-3">
                <h1 class="text-center mb-4">Entrar</h1>
                <form action="efetuar_login.php" method="POST">
                    <div class="mb-3">
                        <label for="entrarInputNickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="entrarInputNickname" name="nickname" size="11" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="entrarInputPassword" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="entrarInputPassword" name="senha" size="15" maxlength="12" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php echo file_get_contents('footer.html') ?>

</body>

</html>