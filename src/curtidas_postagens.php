<?php
    include "autentica.php";
    include "return_dados.php";
    include "conecta_mysql.php";

    $cod_postagem = $_GET["cod_postagem"];

    $nick = $_SESSION["nickname"];

    $sql = "SELECT * FROM usuarios WHERE nickname LIKE '$nick'";
    $resposta = mysqli_query($mysqli,$sql);
    $user = mysqli_fetch_array($resposta);
    $cod_usuario = $user["cod_usuario"];

    $sql2 = "SELECT * FROM curtidas_postagens WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem";
    $resposta2 = mysqli_query($mysqli,$sql2);
    $linhas = mysqli_num_rows($resposta2);

    if($linhas != 0){
        $remove = "DELETE FROM curtidas_postagens WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem";
        mysqli_query($mysqli,$remove);
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
        exit;
    } else {
        $adiciona = "INSERT INTO curtidas_postagens (cod_curtida_postagem,cod_usuario,cod_postagem)";
        $adiciona .= "VALUES (NULL,$cod_usuario,$cod_postagem);";
        mysqli_query($mysqli,$adiciona);
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
        exit;
    }
    
    mysqli_close($mysqli);

?>