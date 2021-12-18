<?php

include "conecta_mysql.php";
$cod_usuario = $_POST["cod_usuario"];

$sql_curtidas_comentarios_proprias = "DELETE FROM curtidas_comentarios WHERE cod_usuario = $cod_usuario;";
mysqli_query($mysqli, $sql_curtidas_comentarios_proprias);

$sql_curtidas_postagens_proprias = "DELETE FROM curtidas_postagens WHERE cod_usuario = $cod_usuario;";
mysqli_query($mysqli, $sql_curtidas_postagens_proprias);

$sql_select_comentarios_proprios = "SELECT * FROM comentarios WHERE cod_usuario = $cod_usuario;";
$resposta_comentarios_proprios = mysqli_query($mysqli, $sql_select_comentarios_proprios);
$linhas_comentarios_proprios = mysqli_num_rows($resposta_comentarios_proprios);
for ($i = 0; $i < $linhas_comentarios_proprios; $i++) {
    $comentario_proprio = mysqli_fetch_array($resposta_comentarios_proprios);
    $cod_comentario = $comentario_proprio["cod_comentario"];
    $sql_curtidas_comentarios_proprios = "DELETE FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario;";
    mysqli_query($mysqli, $sql_curtidas_comentarios_proprios);
}

$sql_comentarios_proprios = "DELETE FROM comentarios WHERE cod_usuario = $cod_usuario;";
mysqli_query($mysqli, $sql_comentarios_proprios);

$sql_select_postagens = "SELECT * FROM postagens WHERE cod_usuario = $cod_usuario;";
$resposta_postagens = mysqli_query($mysqli, $sql_select_postagens);
$linhas_postagens = mysqli_num_rows($resposta_postagens);
for ($i = 0; $i < $linhas_postagens; $i++) {
    $postagem = mysqli_fetch_array($resposta_postagens);
    $cod_postagem = $postagem["cod_postagem"];
    $sql_curtidas_postagens = "DELETE FROM curtidas_postagens WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli, $sql_curtidas_postagens);

    $sql_select_comentarios = "SELECT * FROM comentarios WHERE cod_postagem = $cod_postagem;";
    $resposta_comentarios = mysqli_query($mysqli, $sql_select_comentarios);
    $linhas_comentarios = mysqli_num_rows($resposta_comentarios);
    for ($i = 0; $i < $linhas_comentarios; $i++) {
        $comentario = mysqli_fetch_array($resposta_comentarios);
        $cod_comentario = $comentario["cod_comentario"];
        $sql_curtidas_comentarios = "DELETE FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario;";
        mysqli_query($mysqli, $sql_curtidas_comentarios);
    }
    $sql_comentarios = "DELETE FROM comentarios WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli, $sql_comentarios);
}

$sql_timeline = "DELETE FROM timeline WHERE cod_usuario = $cod_usuario;";
mysqli_query($mysqli, $sql_timeline);

$sql_postagens = "DELETE FROM postagens WHERE cod_usuario = $cod_usuario;";
mysqli_query($mysqli, $sql_postagens);

$sql_usuarios = "DELETE FROM usuarios WHERE cod_usuario = $cod_usuario;";
mysqli_query($mysqli, $sql_usuarios);

echo "<script> alert('Conta excluída com sucesso!'); 
javascript:history.go(-1);</script> <br>";

mysqli_close($mysqli);
