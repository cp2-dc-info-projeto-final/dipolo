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
                        <form class="m-0">
                            <button type="submit" class="btn dropdown-item rounded-0">Excluir</button>
                        </form>
                    </li>
                    <li>
                        <?php if (return_dados("adm", $usuario["nickname"])) : ?>
                            <form class="m-0">
                                <button type="submit" class="btn dropdown-item rounded-0">Retirar privilégios</button>
                            </form>
                        <?php else : ?>
                            <form class="m-0">
                                <button type="submit" class="btn dropdown-item rounded-0">Conceder privilégios</button>
                            </form>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <?php if (return_dados("adm", $usuario["nickname"])) : ?>
            <p class="text-success m-0">É administrador</p>
        <?php else : ?>
            <p class="text-danger m-0">Não é administrador</p>
        <?php endif; ?>
    </div>
</div>