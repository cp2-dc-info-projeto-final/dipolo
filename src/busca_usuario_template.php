<div class="mt-3 p-2 ps-3 border border-dark rounded">
    <div class="row">
        <div class="col-auto me-auto">
            <h5><?php echo $usuario["nickname"]; ?></h5>
        </div>
        <div class="col-auto">
            <form action="timeline.php" method="GET">
                <input type="hidden" name="nickname" value="<?php echo $usuario["nickname"]; ?>">
                <button type="submit" class="btn btn-outline-primary">Ver timeline</button>
            </form>
        </div>
    </div>
</div>