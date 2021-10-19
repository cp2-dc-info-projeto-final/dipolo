<?php include "autentica.inc"; ?>

<html>
    <head>
        <title>Página inicial</title>
    </head>

    <body>
        Texto Aleatório
        <p><a href="logout.php">LOGOUT</a></p>
        <br><br>

        <p><strong>Exibir Meus Dados</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="login" value="exibir">
            <input type="hidden" name="nickname" value="<?php echo $_SESSION["nickname"] ?>">
            <p><input type="submit" value="Exibir"></p>
        </form>

    </body>
</html>