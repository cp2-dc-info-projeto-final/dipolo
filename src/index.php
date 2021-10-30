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

    <nav class="navbar d-block navbar-dark bg-azul">
        <div class="d-flex">
            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">Página principal</a></li>
                <li><a class="dropdown-item" href="#">Entrar / Cadastrar</a></li>
                <li><a class="dropdown-item" href="#">Ajuda</a></li>
                <li><a class="dropdown-item" href="#">Enviar feedback</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sobre</a></li>
            </ul>
            <a class="navbar-brand ms-2" style="font-weight: 500;" href="#">Dipolo</a>
            <form class="d-flex ms-auto my-2 my-lg-0 me-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <p><strong>Exibir Meus Dados</strong></p>
    <form action="recebe_dados.php" method="POST">
        <input type="hidden" name="login" value="exibir">
        <input type="hidden" name="nick" value="<?php echo $_SESSION["nickname"] ?>">
        <p><input type="submit" value="Exibir"></p>
    </form>
    <p><a href="logout.php">LOGOUT</a></p>
    <br><br>

</body>

</html>