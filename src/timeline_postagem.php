<?php if ($linhas_postagens == 0) : ?>
    <p>Não existem postagens.</p>
<?php else : ?>
    <?php include "verificar_curtida.php"; ?>
    <div class="row mx-0">
        <div class="mt-3 p-2 ps-3 border border-dark rounded">
            <div class="row me-0">
                <p class="pe-0">
                    <a href="postagem.php?cod_postagem=<?php echo $postagem["cod_postagem"]; ?>" class="text-decoration-none text-dark">
                        <?php echo $postagem["texto_post"]; ?>
                    </a>
                </p>
            </div>
            <div class="row me-0 justify-content-end align-items-center">
                <div class="col-auto px-1">
                    <a href="curtidas_postagens.php?cod_postagem=<?php echo $postagem["cod_postagem"]; ?>" class="btn btn-lg px-2" aria-label="Curtir postagem">
                        <?php if (usuario_curtiu_postagem($postagem["cod_postagem"], return_dados("cod_usuario", ""))) : ?>
                            <i class="bi bi-hand-thumbs-up-fill text-primary"></i>
                        <?php else : ?>
                            <i class="bi bi-hand-thumbs-up"></i>
                        <?php endif; ?>
                    </a>
                    <span><?php echo return_curtidas($postagem["cod_postagem"]); ?></span>
                </div>
                <?php if ($usuario["nickname"] == $_SESSION["nickname"] || $usuario["adm"]) : ?>
                    <div class="col-auto px-1">
                        <button class="btn btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#editar<?php echo $usuario['nickname'] ?>Modal">
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