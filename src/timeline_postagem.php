<?php if ($linhas_postagens == 0) : ?>
    <p>Não existem postagens.</p>
<?php else : ?>
    <div class="row mx-0">
        <div class="mt-3 p-2 ps-3 border border-dark rounded">
            <div class="row me-0">
                <p class="pe-0">
                    <a href="postagem.php?cod_postagem=<?php echo $postagem["cod_postagem"]; ?>" class="text-decoration-none text-dark">
                        <?php echo $postagem["texto_post"]; ?>
                    </a>
                </p>
            </div>
            <div class="row me-0 justify-content-end">
                <div class="col-auto px-1">
                    <button type="button" class="btn" aria-label="Curtir postagem">
                        <i class="bi bi-hand-thumbs-up"></i>
                    </button>
                </div>
                <?php if ($usuario["nickname"] == $_SESSION["nickname"] || $usuario["adm"]) : ?>
                    <div class="col-auto px-1">
                        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#editar<?php echo $usuario['nickname'] ?>Modal">
                            <i class="bi bi-gear" aria-label="Editar postagem"></i>
                        </button>
                    </div>
                    <div class="col-auto px-1">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirModalPostagem<?php echo $cod_postagem; ?>" aria-label="Excluir postagem">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>