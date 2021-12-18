<div class="row justify-content-center px-4 align-items-bottom mb-4">
    <div class="col-2 ps-5">
        <div class="ps-5">
            <div class="ps-4">
                <div class="w-100 text-center">
                    <img src="<?php echo $usuario_comentario["caminho_img"] ?>" class="img-thumbnail w-100" alt="Foto de perfil">
                </div>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="row mx-0">
            <div class="p-3 border border-dark rounded">
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
                    <div class="col-auto px-1">
                        <a href="curtidas_comentarios.php?cod_comentario=<?php echo $comentario["cod_comentario"]; ?>" class="btn btn-lg px-2"
                            <?php if (usuario_curtiu_comentario($comentario["cod_comentario"], $_SESSION["cod_usuario"], $mysqli)) : ?>
                                aria-label="Descurtir comentário">
                                <i aria-hidden="true" class="bi bi-hand-thumbs-up-fill text-primary" title="Descurtir comentário"></i>
                            <?php else : ?>
                                aria-label="Curtir comentário">
                                <i aria-hidden="true" class="bi bi-hand-thumbs-up" title="Curtir comentário"></i>
                            <?php endif; ?>
                        </a>
                        <span><?php echo return_curtidas_comentario($comentario["cod_comentario"], $mysqli); ?></span>
                    </div>
                    <?php if ($usuario_comentario["nickname"] == $_SESSION["nickname"]) : ?>
                        <div class="col-auto px-1">
                            <button class="btn btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#editarComentario<?php echo $comentario['cod_comentario'] ?>Modal" aria-label="Editar comentário">
                                <i aria-hidden="true" class="bi bi-gear" title="Editar comentário"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($usuario_comentario["nickname"] == $_SESSION["nickname"] || $usuario["adm"]) : ?>
                        <div class="col-auto px-1">
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirComentario<?php echo $comentario['cod_comentario']; ?>Modal" aria-label="Excluir comentário">
                                <i aria-hidden="true" class="bi bi-trash-fill" title="Excluir comentário"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarComentario<?php echo $comentario['cod_comentario'] ?>Modal" tabindex="-1" aria-labelledby="editar<?php echo $comentario['cod_comentario'] ?>ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editar<?php echo $comentario['cod_comentario'] ?>ModalLabel">Editar comentário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form action="recebe_alteracao.php" method="POST">
                            <input type="hidden" name="login" value="alterar_comentario">
                            <input type="hidden" name="cod_comentario" value="<?php echo $comentario['cod_comentario'] ?>">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="editar<?php echo $comentario['cod_comentario'] ?>ModalInputTextoComent" class="form-label">Comentário</label>
                                    <textarea id="editar<?php echo $comentario['cod_comentario'] ?>ModalInputTextoComent" class="form-control mb-3" name="texto_coment" rows="5" maxlength="350"><?php echo $comentario['texto_coment'] ?></textarea>
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
</div>