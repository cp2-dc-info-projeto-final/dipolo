<?php include "autentica.inc"; ?>

<html>
    <head>
        <title>Página inicial</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

    <body>
        Texto Aleatório
        <p><a href="logout.php">LOGOUT</a></p>
        <br><br>

        <p><strong>Exibir Meus Dados</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="login" value="exibir">
            <input type="hidden" name="nick" value="<?php echo $_SESSION["nickname"] ?>">
            <p><input type="submit" value="Exibir"></p>
        </form>


    </body>
</html>
