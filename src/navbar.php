<nav class="navbar d-block navbar-dark bg-azul">
    <div class="d-flex">
        <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php">Página principal</a></li>
            <?php if ($_SESSION["fez_login"] == false) : ?>
                <li><a href="#" class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#entrarModalNav">Entrar</a></li>
                <li><a class="dropdown-item" href="cadastro.php">Cadastrar</a></li>
            <?php endif; ?>
            <li><a class="dropdown-item disabled" href="#">Ajuda</a></li>
            <li><a class="dropdown-item disabled" href="#">Enviar feedback</a></li>
            <?php if ($_SESSION["fez_login"]) : ?>
                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            <?php endif; ?>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item disabled" href="#">Sobre</a></li>
        </ul>
        <a class="navbar-brand ms-2" href="index.php">
            <img src="../imagens/favicon.svg" alt="Ícone do site" height="32">
        </a>
        <?php if ($_SESSION["fez_login"]) : ?>
            <form action="recebe_busca.php" method="POST" class="d-flex ms-auto my-2 my-lg-0 me-4">
                <input type="hidden" name="login" value="buscar_nickname">
                <input class="form-control me-2" name="nick" type="search" placeholder="Nickname" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
        <?php endif; ?>
    </div>
</nav>

<div class="modal fade" id="entrarModalNav" tabindex="-1" aria-labelledby="entrarModalLabelNav" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="entrarModalLabelNav">Entrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="efetuar_login.php" method="POST">
                    <div class="mb-3">
                        <label for="entrarModalInputNicknameNav" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="entrarModalInputNicknameNav" name="nickname" size="11" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="entrarModalInputPasswordNav" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="entrarModalInputPasswordNav" name="senha" size="15" maxlength="12" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>