<?php
function return_dados($dado, $nick, $mysqli)
{
    if ($nick == "") {
        $nick = $_SESSION["nickname"];
        $nick = htmlspecialchars($nick);
    }

    $sql = "SELECT * FROM usuarios WHERE nickname LIKE '$nick';";
    $resposta = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_array($resposta);

    if ($dado == "nickname") {
        return $usuario["nickname"];
    } elseif ($dado == "nome") {
        return $usuario["nome"];
    } elseif ($dado == "email") {
        return $usuario["email"];
    } elseif ($dado == "datanasc") {
        return $usuario["datanasc"];
    } elseif ($dado == "adm") {
        return $usuario["adm"];
    } elseif ($dado == "cod_usuario") {
        return $usuario["cod_usuario"];
    } elseif ($dado == "caminho_img") {
        if ($usuario["caminho_img"] == null) {
            return "../imagens/no-image.svg";
        } else {
            return $usuario["caminho_img"];
        }
    }
}

/*function return_dados2($dado2, $nick2)
{
    include "conecta_mysql.php";

    if ($nick2 == "") {
        $nick2 = $_SESSION["nickname"];
        $nick2 = htmlspecialchars($nick2);
    }

    $sql2 = "SELECT cod_usuario FROM usuarios WHERE nickname LIKE '$nick2';";
    $cod_usuario = mysqli_query($mysqli, $sql2);

    $sql3 = "SELECT * FROM postagens WHERE cod_usuario = $cod_usuario;";
    $resposta3 = mysqli_query($mysqli, $sql3);
    $postagem = mysqli_fetch_array($resposta3);

    if($dado == "cod_postagem"){
        return $postagem["cod_postagem"];
    } elseif ($dado == "texto_post") {
        return $postagem["texto_post"];
    } elseif ($dado == "cod_comentario"){
        return $postagem["cod_comentario"];
    }
}*/
