<?php

function return_postagem($cod_postagem, $mysqli)
{
    $sql_postagens = "SELECT * FROM postagens WHERE cod_postagem = $cod_postagem";
    $resposta_postagens = mysqli_query($mysqli, $sql_postagens);
    $postagem = mysqli_fetch_array($resposta_postagens);
    return $postagem;
}
