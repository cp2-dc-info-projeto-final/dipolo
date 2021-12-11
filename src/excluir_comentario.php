<?php

    include "conecta_mysql.php";

    $cod_comentario = $_POST["cod_comentario"];
    $sql ="DELETE FROM comentarios WHERE cod_comentario = $cod_comentario;"; 
    mysqli_query($mysqli,$sql);
    header("Location: index.php");

    mysqli_close($mysqli);

?>