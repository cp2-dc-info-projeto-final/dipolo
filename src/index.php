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
        Texto Aleatório
        <p><a href="logout.php">LOGOUT</a></p>
        <br><br>

        <p><strong>Exibir Meus Dados</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="login" value="exibir">
            <input type="hidden" name="nick" value="<?php echo $_SESSION["nickname"] ?>">
            <p><input type="submit" value="Exibir"></p>
        </form>

        <!-- Footer -->

        <footer class="bg-azul text-light">
            <div class="container-fluid text-md-left pt-4">
                <div class="row justify-content-start mb-3">
                    <div class="col-md-2 mt-md-0 mt-n2">
                        <a class="text-light text-decoration-none fs-1 ms-4" style="font-weight: 600;" href="index.php">Dipolo</a>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <div class="col-md-2 mb-md-0 mb-3 pt-3">
                        <ul class="list-unstyled">
                        <li>
                            <a class="text-light text-decoration-none" href="index.php">Página Principal</a>
                        </li>
                        <li>
                            <a class="text-light text-decoration-none" href="#!">Ajuda</a>
                        </li>
                        <li>
                            <a class="text-light text-decoration-none" href="#!">Sobre</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-md-2 mb-md-0 mb-3 pt-3">
                        <ul class="list-unstyled">
                        <li>
                            <a class="text-light text-decoration-none" href="#!">Enviar Feedback</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>                
            <div class="text-center py-3">
                <a>Dipolo Corporation © 2021</a>
            </div>
        </footer>

        <!-- Footer -->
    </body>
</html>
