<div class="mt-3 p-2 ps-3 border border-dark rounded">
    <div class="row justify-content-between">
        <div class="col-8">
            <h5><?php echo return_dados("nickname", $usuario["nickname"]); ?></h5>
        </div>
        <div class="col-1">
            <a class="btn text-decoration-none text-dark" type="button" data-bs-toggle="modal" data-bs-target="#editar<?php echo $usuario['nickname'] ?>Modal">
                <i class="bi bi-gear" role="img" aria-label="Editar dados"></i>
            </a>
        </div>
        <div class="col-2">
            <div class="dropdown">
                <button type="button" class="btn px-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="bi bi-three-dots-vertical"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form action="excluir_conta.php" method="POST" class="m-0">
                            <button type="submit" class="btn dropdown-item rounded-0" name="usuario_alvo" value="<?php echo $usuario["nickname"]; ?>">
                                Excluir
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="admin_privilegio.php" method="POST" class="m-0">
                            <button type="submit" class="btn dropdown-item rounded-0" name="usuario_alvo" value="<?php echo $usuario["nickname"]; ?>">
                                <?php if (return_dados("adm", $usuario["nickname"])) : ?>
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
        <?php if (return_dados("adm", $usuario["nickname"])) : ?>
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
                <form action="admin_editar.php" method="POST">
                    <div class="mb-3">
                        <label for="editar<?php echo $usuario['nickname'] ?>ModalInputNickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="editar<?php echo $usuario['nickname'] ?>ModalInputNickname" name="nickname" size="11" maxlength="10" placeholder="<?php echo $usuario['nickname'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="usuario_alvo" value="<?php echo $usuario["nickname"]; ?>">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>