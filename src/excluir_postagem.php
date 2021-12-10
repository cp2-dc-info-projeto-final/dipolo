<?php

    include "conecta_mysql.php";

    $cod_postagem = $_GET["cod_postagem"];
    $sql3 ="DELETE FROM comentarios WHERE cod_postagem = $cod_postagem;"; 
    mysqli_query($mysqli,$sql3);
    $sql2 ="DELETE FROM timeline WHERE cod_postagem = $cod_postagem;"; 
    mysqli_query($mysqli,$sql2);
    $sql ="DELETE FROM postagens WHERE cod_postagem = $cod_postagem;"; 
    mysqli_query($mysqli,$sql); 
    header("Location: index.php");

    mysqli_close($mysqli);

?>