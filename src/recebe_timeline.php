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

        for($i = 0; $i < $linhas; $i++)
        {
            $line = mysqli_fetch_array($resposta2);

            $nick = $time["nickname"];
            $text_coment = $line["texto_post"];

            echo "Nick do usuário: $nick <br>";
            echo "Post do usuario: $text_coment <br><br>";
        }

    }

    mysqli_close($mysqli);

?>