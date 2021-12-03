<?php
    include "autentica.php";
    include "return_dados.php";
    include "conecta_mysql.php";

    $cod_postagem = $_GET["cod_postagem"];

    $sql ="SELECT * FROM comentarios WHERE cod_postagem = $cod_postagem;"; 
    $resposta = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($resposta);

    /*$sql2 = "SELECT * FROM postagens WHERE cod_postagem = $cod_postagem;";
    $resposta2 = mysqli_query($mysqli, $sql2);

    $postagem_comentario = mysqli_fetch_array($resposta2);
    $post = $postagem_comentario["texto_post"];
    $cod_user = $postagem_comentario["cod_usuario"];

    $sql3 = "SELECT nickname FROM usuarios WHERE cod_usuario = $cod_user";
    $user_post = mysqli_query($mysqli,$sql3);

    echo "Usuário que fez a postagem: $user_post <br>";
    echo "Postagem: $post <br><br>";*/

    for($i = 0; $i < $linhas; $i++)
    {
        $coment = mysqli_fetch_array($resposta);
        $cod_usuario = $coment["cod_usuario"];
        $text_coment = $coment["texto_coment"];

        $sql4 = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
        $resposta4 = mysqli_query($mysqli,$sql4);
        $user = mysqli_fetch_array($resposta4);
        $nickname = $user["nickname"];

        echo "Nick do usuário que comentou: $nickname <br>";
        echo "Comentário: $text_coment <br><br>";

    }

    echo "<br><Br><a href='index.php'> Voltar para a página inicial </a>";


?>