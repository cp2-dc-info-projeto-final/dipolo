<?php

function admin_listar_usuarios()
{
    include "conecta_mysql.php";

    $sql = "SELECT * FROM usuarios";
    $resposta = mysqli_query($mysqli, $sql);
    $numero_rows = mysqli_num_rows($resposta);
    for ($i = 0; $i < $numero_rows; $i++) {
        $usuario = mysqli_fetch_assoc($resposta);
        include "admin_usuario.php";
    }
}

?>