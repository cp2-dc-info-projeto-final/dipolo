<br><Br><br>
<form action="recebe_timeline.php" method="POST">
    <input type="hidden" name="publi" value="timeline">
    <input type="hidden" name="cod_usuario" value="<?php echo return_dados("cod_usuario", ""); ?>">
    <button type="submit" class="btn btn-outline-primary btn-lg">Ver timeline</button>
</form>