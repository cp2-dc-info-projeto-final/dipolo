<?php
    include "conecta_mysql.php";

    $cod_usuario = $_POST["cod_usuario"];
    $sql6 ="DELETE FROM curtidas_comentarios WHERE cod_usuario = $cod_usuario;";
    mysqli_query($mysqli,$sql6);

    $sql5 ="DELETE FROM curtidas_postagens WHERE cod_usuario = $cod_usuario;";
    mysqli_query($mysqli,$sql5);
    
    $sql4 ="DELETE FROM comentarios WHERE cod_usuario = $cod_usuario;";
    mysqli_query($mysqli,$sql4);

    $sql3 ="DELETE FROM timeline WHERE cod_usuario = $cod_usuario;";
    mysqli_query($mysqli,$sql3);

    $sql2 ="DELETE FROM postagens WHERE cod_usuario = $cod_usuario;";
    mysqli_query($mysqli,$sql2);

    $sql ="DELETE FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    mysqli_query($mysqli,$sql);

    echo "<script> alert('Conta excluída com sucesso!'); 
            window.location='logout.php';</script> <br>";

    mysqli_close($mysqli);
?> 