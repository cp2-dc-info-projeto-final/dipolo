<?php

function usuario_curtiu_postagem($cod_postagem, $cod_usuario)
{
    include "conecta_mysql.php";

    $sql = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem AND cod_usuario = $cod_usuario;";
    $resposta = mysqli_query($mysqli, $sql);
    $curtida = mysqli_num_rows($resposta);

    if ($curtida == 1) {
        return true;
    } else {
        return false;
    }
}

function return_curtidas($cod_postagem)
{
    include "conecta_mysql.php";

    $sql = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem;";
    $resposta = mysqli_query($mysqli, $sql);
    $curtidas = mysqli_num_rows($resposta);

    return $curtidas;
}
