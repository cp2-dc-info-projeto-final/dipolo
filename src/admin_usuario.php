<div class="mt-3 p-2 ps-3 border border-dark rounded">
    <div class="row justify-content-between">
        <div class="col-8">
            <h5>
                <a href="timeline.php?nickname=<?php echo $usuario["nickname"]; ?>" class="text-decoration-none text-dark">
                    <?php echo $usuario["nickname"]; ?>
                </a>
            </h5>
        </div>
        <div class="col-1">
            <a class="btn text-decoration-none text-dark" type="button" data-bs-toggle="modal" data-bs-target="#editar<?php echo $usuario['nickname'] ?>Modal" aria-label="Editar dados">
                <i aria-hidden="true" class="bi bi-gear" role="img" title="Editar dados"></i>
            </a>
        </div>
        <div class="col-2">
            <div class="dropdown">
                <button type="button" class="btn px-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="bi bi-three-dots-vertical"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button type="button" class="btn dropdown-item rounded-0" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $usuario['nickname'] ?>Modal">
                            Excluir
                        </button>
                    </li>
                    <li>
                        <form action="admin_privilegio.php" method="POST" class="m-0">
                            <button type="submit" class="btn dropdown-item rounded-0" name="usuario_alvo" value="<?php echo $usuario["nickname"]; ?>">
                                <?php if ($usuario["adm"]) : ?>
                                    Retirar privilégios
                                <?php else : ?>
                                    Conceder privilégios
                                <?php endif; ?>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <?php if ($usuario["adm"]) : ?>
            <p class="text-success m-0">
                É administrador
                <?php if ($usuario["nickname"] == $_SESSION["nickname"]) : ?>
                    (Você)
                <?php endif; ?>
            </p>
        <?php else : ?>
            <p class="text-danger m-0">
                Não é administrador
            </p>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="editar<?php echo $usuario['nickname'] ?>Modal" tabindex="-1" aria-labelledby="editar<?php echo $usuario['nickname'] ?>ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar<?php echo $usuario['nickname'] ?>ModalLabel">Editar <?php echo $usuario['nickname'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="recebe_alteracao.php" method="POST">
                    <input type="hidden" name="login" value="alterar">
                    <input type="hidden" name="cod_usuario" value="<?php echo $usuario['cod_usuario'] ?>">
                    <input type="hidden" name="adm" value="true">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="editar<?php echo $usuario['nickname'] ?>ModalInputNickname" class="form-label">Nickname</label>
                            <input type="text" class="form-control" id="editar<?php echo $usuario['nickname'] ?>ModalInputNickname" name="nickname" size="10" maxlength="10" value="<?php echo $usuario['nickname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editar<?php echo $usuario['nickname'] ?>ModalInputNome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="editar<?php echo $usuario['nickname'] ?>ModalInputNome" name="nome" size="30" maxlength="100" value="<?php echo $usuario['nome'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editar<?php echo $usuario['nickname'] ?>ModalInputDataNasc" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="editar<?php echo $usuario['nickname'] ?>ModalInputDataNasc" name="datanasc" size="11" maxlength="10" value="<?php echo $usuario['datanasc'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editar<?php echo $usuario['nickname'] ?>ModalInputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editar<?php echo $usuario['nickname'] ?>ModalInputEmail" name="email" size="30" maxlength="35" value="<?php echo $usuario['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editar<?php echo $usuario['nickname'] ?>ModalInputConfEmail" class="form-label">
                                <span class="text-danger">*</span>Confirmar Email
                            </label>
                            <input type="text" class="form-control" id="editar<?php echo $usuario['nickname'] ?>ModalInputConfEmail" name="confemail" size="30" maxlength="35" required>
                        </div>
                    </div>

                    <div class="text-danger mb-3">(*Campos Obrigatórios)</div>

                    <button type="submit" class="btn btn-primary">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="excluir<?php echo $usuario['nickname'] ?>Modal" tabindex="-1" aria-labelledby="excluirConta<?php echo $usuario['nickname']; ?>ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirConta<?php echo $usuario['nickname']; ?>ModalLabel">Excluir usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="excluir_conta_usuario.php" method="POST" class="m-0">
                    <button type="submit" class="btn btn-primary" name="cod_usuario" value="<?php echo $usuario["cod_usuario"]; ?>">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>