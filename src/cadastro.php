<html>

<head>
    <title>Cadastrar Usuário</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <p><strong>FORMUÁRIO DE CADASTRO</strong></p>
    <form action="recebe_cadastro.php" method="POST">
        <input type="hidden" name="login" value="cadastrar">

        <p>Nickname: <input type="text" name="nickname" size="10" maxlength="10" required></p>

        <p>Nome Completo: <input type="text" name="nome" size="30" maxlength="100" required></p>

        <p>Data de Nascimento: <input type="date" name="datanasc" required></p>

        <p>Email: <input type="text" name="email" size="30" maxlength="35" required></p>

        <p>Confirmar Email: <input type="text" name="confemail" size="30" maxlength="35" required></p>

        <p>Senha: <input type="password" name="senha" maxlength="12" required></p>

        <p>Confirmar Senha: <input type="password" name="confsenha" maxlength="12" required></p>

        <p>Se for um administrador, insira seu código <br>
            Código de Administrador: <input type="password" name="codadm"></p>

        <p><input type="submit" value="Enviar"></p>
    </form>

    <!-- Footer -->

    <?php echo file_get_contents('footer.html') ?>

</body>

</html>
