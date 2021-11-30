<div class="mt-3 p-2 ps-3 border border-dark rounded">
    <div class="row">
        <div class="col-auto me-auto">
            <h5><?php echo $usuario["nickname"]; ?></h5>
        </div>
        <div class="col-auto">
            <form action="recebe_timeline.php" method="POST">
                <input type="hidden" name="publi" value="timeline">
                <input type="hidden" name="cod_usuario" value="<?php echo return_dados("cod_usuario", $usuario["nickname"]); ?>">
                <button type="submit" class="btn btn-outline-primary">Ver timeline</button>
            </form>
        </div>
    </div>
</div>