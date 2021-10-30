<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</head>

<body>

    <!-- Navbar -->

    <?php
    ob_start();
    include 'navbar.php';
    echo ob_get_clean();
    ?>

    <!-- Conteúdo -->

    <p><strong>LOGIN</strong></p>
    <form action="efetuar_login.php" method="POST">

        <p>Nickname: <input type="text" name="nickname" size="11" maxlength="10" required></p>

        <p>Senha: <input type="password" name="senha" size="15" maxlength="12" required></p>

        <p><input type="submit" value="Enviar"></p>
    </form>

    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;OU</p>
    <a href="cadastro.php"><strong>CADASTRAR-SE</strong></a>

    <!-- Footer -->

    <?php echo file_get_contents('footer.html') ?>

</body>

</html>