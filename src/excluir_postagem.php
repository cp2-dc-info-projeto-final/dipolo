<?php

    include "conecta_mysql.php";

    $cod_postagem = $_POST["cod_postagem"];

    $sql6 = "SELECT * FROM comentarios WHERE cod_postagem = $cod_postagem";
    $resp = mysqli_query($mysqli,$sql6);
    $linhas = mysqli_num_rows($resp);
    for ($i=0; $i < $linhas; $i++){
        $coment = mysqli_fetch_array($resp);
        $cod_comentario = $coment["cod_comentario"];
        $sql5 ="DELETE FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario;";
        mysqli_query($mysqli,$sql5);
    }
    $sql4 ="DELETE FROM curtidas_postagens WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql4);
    $sql3 ="DELETE FROM comentarios WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql3);
    $sql2 ="DELETE FROM timeline WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql2);
    $sql ="DELETE FROM postagens WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql);
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

    mysqli_close($mysqli);

?>