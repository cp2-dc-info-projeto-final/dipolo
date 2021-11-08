<nav class="navbar d-block navbar-dark bg-azul">
    <div class="d-flex">
        <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php">Página principal</a></li>
            <li><a class="dropdown-item" href="login_cadastro.php">Entrar / Cadastrar</a></li>
            <li><a class="dropdown-item disabled" href="#">Ajuda</a></li>
            <li><a class="dropdown-item disabled" href="#">Enviar feedback</a></li>
            <?php if($_SESSION["fez_login"]) : ?>
            <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            <?php endif; ?>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item disabled" href="#">Sobre</a></li>
        </ul>
        <a class="navbar-brand ms-2" style="font-weight: 500;" href="index.php">Dipolo</a>
        <form action="recebe_busca.php" method="POST" class="d-flex ms-auto my-2 my-lg-0 me-4">
            <input type="hidden" name="login" value="buscar_usuarios">
            <input class="form-control me-2" name="nick" type="search" placeholder="Nickname" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>
</nav>
