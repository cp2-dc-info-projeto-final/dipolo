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

    if($linhas == 0)
    {
        echo "Não existem comentários";
    }

    for($i = 0; $i < $linhas; $i++)
    {
        $coment = mysqli_fetch_array($resposta);
        $cod_usuario = $coment["cod_usuario"];
        $text_coment = $coment["texto_coment"];
        $cod_comentario = $coment["cod_comentario"];

        $selectComentarios = "SELECT * FROM curtidas_comentarios WHERE cod_comentario = $cod_comentario";
        $selecionar_comentarios = mysqli_query($mysqli,$selectComentarios);
        $conta_curtidas = mysqli_num_rows($selecionar_comentarios);

        if($conta_curtidas == 1){
            $conta_curtidas = $conta_curtidas." curtiu";
        } else if($conta_curtidas > 1){
            $conta_curtidas = $conta_curtidas." curtiram";
        }

        $sql4 = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
        $resposta4 = mysqli_query($mysqli,$sql4);
        $user = mysqli_fetch_array($resposta4);
        $nickname = $user["nickname"];

        echo "<br>Nick do usuário que comentou: $nickname <br>";
        echo "Comentário: $text_coment <br>";

        $sql2 = "SELECT * FROM curtidas_comentarios WHERE cod_usuario = $cod_usuario AND cod_comentario = $cod_comentario";
        $resposta2 = mysqli_query($mysqli,$sql2);
        $linhas2 = mysqli_num_rows($resposta2);

        if($_SESSION["nickname"] == $nickname)
        {
            echo "<a href='alteracao_comentario.php?cod_comentario=".$cod_comentario.
                   "'> Editar comentário </a> <br>";
            echo "<a href='excluir_comentario.php?cod_comentario=".$cod_comentario.
                   "'> Excluir comentário </a> <br>";
        }

        if($linhas2 != 0){
            echo "<code><spam>*curtidas* </spam>".$conta_curtidas."</code><br>
                    <a href='curtidas_comentarios.php?cod_comentario=".$cod_comentario.
                    "'> Deslike </a> <br><br>";   
        } else {
            echo "<code><spam>*curtidas* </spam>".$conta_curtidas."</code><br>
                    <a href='curtidas_comentarios.php?cod_comentario=".$cod_comentario.
                    "'> Like </a> <br><br>"; 
        }

    }

    echo "<br><Br><a href='index.php'> Voltar para a página inicial </a>";

    mysqli_close($mysqli);

?>