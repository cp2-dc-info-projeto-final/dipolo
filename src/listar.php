<?php

function listar_postagens($cod_usuario)
{
    include "conecta_mysql.php";
    include_once "return_dados.php";
    include_once "verificar_curtida.php";
    include_once "return_usuario.php";
    $usuario_atual = return_usuario($cod_usuario);

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

        include "timeline_postagem.php";
    }
}
