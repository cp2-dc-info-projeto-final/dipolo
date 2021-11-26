<?php

    include "conecta_mysql.php";

    $publi = $_POST["publi"];

    if($publi == "post")
    {
        $texto_post = $_POST["texto_post"];
        $cod_usuario = $_POST["cod_usuario"];

        $texto_post = htmlspecialchars($texto_post);

        $sql ="INSERT INTO postagens (cod_postagem, texto_post, cod_usuario)"; 
        $sql .= "VALUES (NULL, '$texto_post', $cod_usuario);";
        mysqli_query($mysqli,$sql);

        header("Location: index.php");
    }

    $sql2 = "SELECT * FROM postagens";
    $resposta = mysqli_query($mysqli, $sql2);
    $linhas = mysqli_num_rows($resposta);

    for($i = 0; $i < $linhas; $i++)
    {
        $post = mysqli_fetch_array($resposta);
        $cod_postagem = $post["cod_postagem"];
        $cod_usuario = $post["cod_usuario"];

        $sql1 = "INSERT INTO timeline (cod_usuario, cod_postagem)" ;
        $sql1 .= "VALUES ($cod_usuario, $cod_postagem);";
        mysqli_query($mysqli,$sql1);
    }

    mysqli_close($mysqli);


?>