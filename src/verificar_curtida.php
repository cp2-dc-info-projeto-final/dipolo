<?php

function usuario_curtiu_postagem($cod_postagem, $cod_usuario, $mysqli)
{
    $sql = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem AND cod_usuario = $cod_usuario;";
    $resposta = mysqli_query($mysqli, $sql);
    $curtida = mysqli_num_rows($resposta);

    if ($curtida == 1) {
        return true;
    } else {
        return false;
    }
}

function return_curtidas($cod_postagem, $mysqli)
{
    $sql = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem;";
    $resposta = mysqli_query($mysqli, $sql);
    $curtidas = mysqli_num_rows($resposta);

    return $curtidas;
}

function usuario_curtiu_comentario($cod_comentario, $cod_usuario, $mysqli)
{
    $sql = "SELECT * FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario AND cod_usuario = $cod_usuario";
    $resposta = mysqli_query($mysqli, $sql);
    $curtida = mysqli_num_rows($resposta);

    if ($curtida == 1) {
        return true;
    } else {
        return false;
    }
}

function return_curtidas_comentario($cod_comentario, $mysqli)
{
    $sql = "SELECT * FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario";
    $resposta = mysqli_query($mysqli, $sql);
    $curtidas = mysqli_num_rows($resposta);

    return $curtidas;
}
