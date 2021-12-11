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

<div class="modal fade" id="editar<?php echo $postagem['cod_postagem'] ?>Modal" tabindex="-1" aria-labelledby="editar<?php echo $postagem['cod_postagem'] ?>ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar<?php echo $postagem['cod_postagem'] ?>ModalLabel">Editar postagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="recebe_alteracao.php" method="POST">
                    <input type="hidden" name="login" value="alterar_postagem">
                    <input type="hidden" name="cod_postagem" value="<?php echo $postagem['cod_postagem'] ?>">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="editar<?php echo $postagem['cod_postagem'] ?>ModalInputTextoPost" class="form-label">Postagem</label>
                            <input type="text" class="form-control" id="editar<?php echo $postagem['cod_postagem'] ?>ModalInputTextoPost" name="texto_post" size="11" maxlength="350" placeholder="<?php echo $postagem['texto_post'] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Editar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>