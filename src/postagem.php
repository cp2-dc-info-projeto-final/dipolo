<div class="col-7">
    <form action="recebe_postagem.php" method="POST">
        <input type="hidden" name="publi" value="post">
        <input type="hidden" name="cod_usuario" value="<?php echo return_dados("cod_usuario", ""); ?>">
        <textarea class="form-control mb-3" name="texto_post" rows="5" placeholder="Comece seu debate aqui" required></textarea>
        <button type="submit" class="btn btn-outline-primary btn-lg">Criar postagem</button>
    </form>
</div>