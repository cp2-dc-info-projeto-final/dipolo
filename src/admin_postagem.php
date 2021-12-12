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
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirPostagem<?php echo $postagem['cod_postagem']; ?>Modal" aria-label="Excluir postagem">
                    <i class="bi bi-trash-fill"></i>
                </button>
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