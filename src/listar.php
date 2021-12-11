<?php

function listar_postagens($cod_usuario)
{
    include "conecta_mysql.php";
    include_once "return_dados.php";

    $sql_usuario = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
    $resposta_usuario = mysqli_query($mysqli, $sql_usuario);

    $sql_postagens = "SELECT * FROM postagens WHERE cod_usuario = $cod_usuario";
    $resposta_postagens = mysqli_query($mysqli, $sql_postagens);
    $linhas_postagens = mysqli_num_rows($resposta_postagens);

    $usuario = mysqli_fetch_array($resposta_usuario);

    if ($linhas_postagens == 0) {
        echo "Não existem postagens";
    }

    for ($i = 0; $i < $linhas_postagens; $i++) {
        $postagem = mysqli_fetch_array($resposta_postagens);
        $cod_postagem = $postagem["cod_postagem"];

        $sql_curtidas = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem";
        $resposta_curtidas = mysqli_query($mysqli, $sql_curtidas);
        $numero_curtidas = mysqli_num_rows($resposta_curtidas);

        $sql_curtida_propria = "SELECT * FROM curtidas_postagens WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem";
        $resposta_curtida_propria = mysqli_query($mysqli, $sql_curtida_propria);
        $curtiu = mysqli_num_rows($resposta_curtida_propria);

        include "timeline_postagem.php";
    }
}
