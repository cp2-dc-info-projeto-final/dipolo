<div class="mt-3 p-2 ps-3 border border-dark rounded">
    <div class="row justify-content-between">
        <div class="col-10">
            <h5><?php echo return_dados("nickname", $usuario["nickname"]); ?></h5>
        </div>
        <div class="col">
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