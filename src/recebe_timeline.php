<?php

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

        for($i = 0; $i < $linhas; $i++)
        {
            $line = mysqli_fetch_array($resposta2);

            $text_post = $line["texto_post"];

            echo "Nick do usuário: $nick <br>";
            echo "Post do usuario: $text_post <br><br>";
        }

        echo "<br><Br><a href='index.php'> Voltar para a página inicial </a>";

    }

    mysqli_close($mysqli);

?>