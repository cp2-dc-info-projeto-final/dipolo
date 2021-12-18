<div class="mt-3 p-2 ps-3 border border-dark rounded">
    <div class="row align-items-center border-bottom border-dark me-0 pb-1 mb-2">
        <div class="col-auto me-auto">
            <p class="mb-0 fw-bold">Ver postagem</p>
        </div>
        <div class="col-auto">
            <a href="postagem.php?cod_postagem=<?php echo $postagem["cod_postagem"]; ?>" aria-label="Link para postagem postagem">
                <i class="bi bi-arrow-right-square-fill btn-lg"></i>
            </a>
        </div>
    </div>
    <div class="row pt-2 mb-3">
        <div class="col-auto me-auto">
            <div class="row me-0">
                <p class="pe-0 text-break">
                    <?php echo $comentario["texto_coment"]; ?>
                </p>
            </div>
            <div class="row me-0 align-items-center">
                <div class="col-auto me-auto">
                    <p class="mb-0 text-muted fw-light">
                        Comentário feito por
                        <a href="timeline.php?nickname=<?php echo $usuario_comentario["nickname"] ?>" class="fw-bold text-decoration-none text-muted">
                            <?php echo $usuario_comentario["nickname"]; ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row me-0 justify-content-center my-2">
        <div class="col-auto px-1">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirComentario<?php echo $comentario['cod_comentario']; ?>Modal" aria-label="Excluir comentário">
                <i aria-hidden="true" class="bi bi-trash-fill" title="Excluir comentário"></i>
            </button>
        </div>
    </div>

    <div class="modal fade" id="excluirComentario<?php echo $comentario['cod_comentario']; ?>Modal" tabindex="-1" aria-labelledby="excluirComentario<?php echo $comentario['cod_comentario']; ?>ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excluirComentario<?php echo $comentario['cod_comentario']; ?>ModalLabel">Excluir comentário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_comentario.php" method="POST">
                        <input type="hidden" name="cod_comentario" value="<?php echo $comentario['cod_comentario'] ?>">
                        <button type="submit" class="btn btn-primary">
                            Excluir comentário
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>