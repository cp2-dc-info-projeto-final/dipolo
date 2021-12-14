<?php

function listar_postagens($cod_usuario)
{
    include "conecta_mysql.php";
    include_once "return_dados.php";
    include_once "verificar_curtida.php";
    include_once "return_usuario.php";
    $usuario_atual = return_usuario(null);

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

function listar_comentarios($cod_postagem)
{
    include "conecta_mysql.php";
    include_once "return_usuario.php";
    include_once "return_postagem.php";
    include_once "verificar_curtida.php";

    $postagem = return_postagem($cod_postagem);
    $usuario = return_usuario(null);

    $sql_comentarios = "SELECT * FROM comentarios WHERE cod_postagem = $cod_postagem";
    $resposta_comentarios = mysqli_query($mysqli, $sql_comentarios);
    $linhas_comentarios = mysqli_num_rows($resposta_comentarios);

    if ($linhas_comentarios == 0) {
        echo "
        <div class=\"row justify-content-center px-4 align-items-bottom my-3\">
            <div class=\"col-2\"></div>
            <div class=\"col-7\">
                <p class=\"mb-4\">Ainda não há comentários nessa postagem.</p>
            </div>
        </div>
        ";
    } else {
        for ($i = 0; $i < $linhas_comentarios; $i++) {
            $comentario = mysqli_fetch_array($resposta_comentarios);
            $usuario_comentario = return_usuario($comentario["cod_usuario"]);

            include "comentario.php";
        }
    }
}
