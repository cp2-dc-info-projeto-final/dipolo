<?php
    include "autentica.php";
    include "return_dados.php";
    include "conecta_mysql.php";

    $publi = $_POST["publi"];

    if($publi == "timeline")
    {
        $cod_usuario = $_POST["cod_usuario"];

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
        $resposta = mysqli_query($mysqli,$sql);

        $sql2 = "SELECT * FROM postagens WHERE cod_usuario = $cod_usuario";
        $resposta2 = mysqli_query($mysqli, $sql2);

        $sql3 = "SELECT * FROM timeline WHERE cod_usuario = $cod_usuario";
        $resposta3 = mysqli_query($mysqli,$sql3);    
        $linhas = mysqli_num_rows($resposta3);

        $time = mysqli_fetch_array($resposta);
        $nick = $time["nickname"];

        if($linhas == 0)
        {
            echo "Não existem postagens";
        }

        for($i = 0; $i < $linhas; $i++)
        {
            $line = mysqli_fetch_array($resposta2);
            $cod_postagem = $line["cod_postagem"];
            $text_post = $line["texto_post"];

            $selectCurtidas = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem";
            $selecionar_curtidas = mysqli_query($mysqli,$selectCurtidas);
            $conta_curtidas = mysqli_num_rows($selecionar_curtidas);

            if($conta_curtidas == 1){
                $conta_curtidas = $conta_curtidas." curtiu";
            } else if($conta_curtidas > 1){
                $conta_curtidas = $conta_curtidas." curtiram";
            }

            echo "Nick do usuário: $nick <br>";
            echo "Post do usuario: $text_post <br>";

            $sql2 = "SELECT * FROM curtidas_postagens WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem";
            $resposta2 = mysqli_query($mysqli,$sql2);
            $linhas = mysqli_num_rows($resposta2);

            if($_SESSION["nickname"] == $nick)
            {
                echo "<a class='text-decoration-none text-dark' 
                        href='alteracao_postagem.php?cod_postagem=".$cod_postagem.
                        "'> Editar postagem </a> <br>";
                echo "<a href='excluir_postagem.php?cod_postagem=".$cod_postagem.
                        "'> Excluir postagem </a> <br>";
            }

            echo "<a href='comentario.php?cod_postagem=".$cod_postagem.
                    "'> Comentar </a> <br>";
            echo "<a href='exibir_comentario.php?cod_postagem=".$cod_postagem.
                    "'> Ver cometários </a> <br>";

            if($linhas != 0){
                echo "<code><spam>*curtidas* </spam>".$conta_curtidas."</code><br>
                        <a href='curtidas_postagens.php?cod_postagem=".$cod_postagem.
                        "'> Deslike </a> <br><br>";   
            } else {
                echo "<code><spam>*curtidas* </spam>".$conta_curtidas."</code><br>
                        <a href='curtidas_postagens.php?cod_postagem=".$cod_postagem.
                        "'> Like </a> <br><br>"; 
            }
        
        }

        echo "<br><Br><a href='index.php'> Voltar para a página inicial </a>";

    }

    mysqli_close($mysqli);

?>