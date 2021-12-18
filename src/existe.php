<?php

function usuario_existe($nickname, $mysqli)
{
    $sql_usuario = "SELECT * FROM usuarios WHERE nickname LIKE \"$nickname\"";
    $resposta_usuario = mysqli_query($mysqli, $sql_usuario);
    $linhas_usuario = mysqli_num_rows($resposta_usuario);

    if ($linhas_usuario == 1) {
        return true;
    } else {
        return false;
    }
}

function postagem_existe($cod_postagem, $mysqli)
{
    $sql_postagens = "SELECT * FROM postagens WHERE cod_postagem = $cod_postagem";
    $resposta_postagens = mysqli_query($mysqli, $sql_postagens);
    $linhas_postagens = mysqli_num_rows($resposta_postagens);

    if ($linhas_postagens == 1) {
        return true;
    } else {
        return false;
    }
}
