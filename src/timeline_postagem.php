<div class="row mx-0">
    <div class="mt-3 p-2 ps-3 border border-dark rounded">
        <div class="row me-0">
            <p class="pe-0 text-break">
                <a href="postagem.php?cod_postagem=<?php echo $postagem["cod_postagem"]; ?>" class="text-decoration-none text-dark">
                    <?php echo $postagem["texto_post"]; ?>
                </a>
            </p>
        </div>
        <div class="row me-0 align-items-center">
            <div class="col-auto me-auto">
                <p class="mb-0 text-muted fw-light">Clique no texto para ver a discussão</p>
            </div>
            <div class="col-auto px-1">
                <a href="curtidas_postagens.php?cod_postagem=<?php echo $postagem["cod_postagem"]; ?>" class="btn btn-lg px-2"
                    <?php if (usuario_curtiu_postagem($postagem["cod_postagem"], $_SESSION["cod_usuario"], $mysqli)) : ?>
                        aria-label="Descurtir postagem">
                        <i aria-hidden="true" class="bi bi-hand-thumbs-up-fill text-primary" title="Descurtir postagem"></i>
                    <?php else : ?>
                        aria-label="Curtir postagem">
                        <i aria-hidden="true" class="bi bi-hand-thumbs-up" title="Curtir postagem"></i>
                    <?php endif; ?>
                </a>
                <span><?php echo return_curtidas($postagem["cod_postagem"], $mysqli); ?></span>
            </div>
            <?php if ($usuario["nickname"] == $_SESSION["nickname"]) : ?>
                <div class="col-auto px-1">
                    <button class="btn btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#editar<?php echo $postagem['cod_postagem'] ?>Modal" aria-label="Editar postagem">
                        <i aria-hidden="true" class="bi bi-gear" title="Editar postagem"></i>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($usuario["nickname"] == $_SESSION["nickname"] || $usuario_atual["adm"]) : ?>
                <div class="col-auto px-1">
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirPostagem<?php echo $postagem['cod_postagem']; ?>Modal" aria-label="Excluir postagem">
                        <i aria-hidden="true" class="bi bi-trash-fill" title="Excluir postagem"></i>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

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
                            <textarea class="form-control mb-3" name="texto_post" rows="5" maxlength="350"><?php echo $postagem['texto_post'] ?></textarea>
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

<div class="modal fade" id="excluirPostagem<?php echo $postagem['cod_postagem']; ?>Modal" tabindex="-1" aria-labelledby="excluirPostagem<?php echo $postagem['cod_postagem']; ?>ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirPostagem<?php echo $postagem['cod_postagem']; ?>ModalLabel">Excluir postagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="excluir_postagem.php" method="POST">
                    <input type="hidden" name="cod_postagem" value="<?php echo $postagem['cod_postagem'] ?>">
                    <button type="submit" class="btn btn-primary">
                        Excluir postagem
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>