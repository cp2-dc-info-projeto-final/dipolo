<?php

function admin_listar_usuarios($mysqli)
{
    $sql = "SELECT * FROM usuarios";
    $resposta = mysqli_query($mysqli, $sql);
    $numero_rows = mysqli_num_rows($resposta);
    for ($i = 0; $i < $numero_rows; $i++) {
        $usuario = mysqli_fetch_assoc($resposta);
        include "admin_usuario.php";
    }
}

function admin_listar_comentarios($mysqli)
{
    include_once "return_usuario.php";
    include_once "return_postagem.php";

    $usuario = return_usuario(null);

    $sql_comentarios = "SELECT * FROM comentarios";
    $resposta_comentarios = mysqli_query($mysqli, $sql_comentarios);
    $linhas_comentarios = mysqli_num_rows($resposta_comentarios);

    if ($linhas_comentarios == 0) {
        echo "
        <div>
            <p class=\"mt-3\">Ainda não há comentários.</p>
        </div>
        ";
    } else {
        for ($i = 0; $i < $linhas_comentarios; $i++) {
            $comentario = mysqli_fetch_array($resposta_comentarios);
            $postagem = return_postagem($comentario["cod_postagem"]);
            $usuario_comentario = return_usuario($comentario["cod_usuario"]);

            include "admin_comentario.php";
        }
    }
}

function admin_listar_postagens($mysqli)
{
    include_once "return_dados.php";
    include_once "verificar_curtida.php";
    include_once "return_usuario.php";

    $usuario = return_usuario(null);

    $sql_postagens = "SELECT * FROM postagens";
    $resposta_postagens = mysqli_query($mysqli, $sql_postagens);
    $linhas_postagens = mysqli_num_rows($resposta_postagens);

    if ($linhas_postagens == 0) {
        echo "
        <div>
            <p class=\"mt-3\">Ainda não há postagens.</p>
        </div>
        ";
    }

    for ($i = 0; $i < $linhas_postagens; $i++) {
        $postagem = mysqli_fetch_array($resposta_postagens);
        $cod_postagem = $postagem["cod_postagem"];

        include "admin_postagem.php";
    }
}
