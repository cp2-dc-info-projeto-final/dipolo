<?php

    include "conecta_mysql.php";

    $cod_postagem = $_POST["cod_postagem"];
    $sql3 ="DELETE FROM comentarios WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql3);
    $sql2 ="DELETE FROM timeline WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql2);
    $sql ="DELETE FROM postagens WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql);
    $sql_curtidas ="DELETE FROM curtidas_postagens WHERE cod_postagem = $cod_postagem;";
    mysqli_query($mysqli,$sql);
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

    mysqli_close($mysqli);

?>