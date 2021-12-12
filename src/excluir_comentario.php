<?php

    include "conecta_mysql.php";

    $cod_comentario = $_POST["cod_comentario"];
    $sql_comentarios ="DELETE FROM comentarios WHERE cod_comentario = $cod_comentario;";
    mysqli_query($mysqli, $sql_comentarios);
    $sql_curtidas_comentarios = "DELETE FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario;";
    mysqli_query($mysqli, $sql_curtidas_comentarios);
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

    mysqli_close($mysqli);

?>