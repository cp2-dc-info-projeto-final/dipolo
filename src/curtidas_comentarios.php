<?php
    include "autentica.php";
    include "return_dados.php";
    include "conecta_mysql.php";

    $cod_comentario = $_GET["cod_comentario"];

    $nick = $_SESSION["nickname"];

    $sql = "SELECT * FROM usuarios WHERE nickname LIKE '$nick'";
    $resposta = mysqli_query($mysqli,$sql);
    $user = mysqli_fetch_array($resposta);
    $cod_usuario = $user["cod_usuario"];

    $sql2 = "SELECT * FROM curtidas_comentarios WHERE cod_usuario = $cod_usuario AND cod_comentario = $cod_comentario";
    $resposta2 = mysqli_query($mysqli,$sql2);
    $linhas = mysqli_num_rows($resposta2);

    if($linhas != 0){
        $remove = "DELETE FROM curtidas_comentarios WHERE cod_usuario = $cod_usuario AND cod_comentario = $cod_comentario";
        mysqli_query($mysqli,$remove);
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
        exit;
    } else {
        $adiciona = "INSERT INTO curtidas_comentarios (cod_curtida_comentario,cod_usuario,cod_comentario)";
        $adiciona .= "VALUES (NULL,$cod_usuario,$cod_comentario);";
        mysqli_query($mysqli,$adiciona);
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
        exit;
    }
    
    mysqli_close($mysqli);

?>