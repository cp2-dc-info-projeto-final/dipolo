<?php

    include "conecta_mysql.php";

    $login = $_POST["login"];

    if($login == "alterar")
    {
        $cod_usuario = $_POST["cod_usuario"];
        $nickname = $_POST["nickname"];
        $nome = $_POST["nome"];
        $datanasc = $_POST["datanasc"];
        $email = $_POST["email"];
        $confemail = $_POST["confemail"];
        $erro = 0;

        $nickname = htmlspecialchars($nickname);
        $nome = htmlspecialchars($nome);
        $email = htmlspecialchars($email);
        $confemail = htmlspecialchars($confemail);

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = '$cod_usuario';";
        $resposta = mysqli_query($mysqli, $sql);
        $usuario = mysqli_fetch_array($resposta);

        $sql2 ="SELECT * FROM usuarios WHERE nickname LIKE '$nickname';"; 
        $resposta2 = mysqli_query($mysqli,$sql2);
        $linhas = mysqli_num_rows($resposta2);

        if($nickname != $usuario["nickname"])
        {
            if($linhas != 0)
            {
                echo "<script> alert('Nickname já existente.'); 
                javascript:history.go(-1);</script> <br>";
                $erro = 1;
            }
        }

        if(strlen($nickname) < 3 OR strlen($nickname) > 10)
        {
            echo "<script> alert('O nickname deve possuir no mínimo 3 e no máximo 10 caracteres.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        if(empty($nome) OR strstr($nome,' ') == FALSE)
        {
            echo "<script> alert('Favor digitar seu nome e sobrenome.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        if(strlen($email) < 8 || strstr($email,'@') == FALSE)
        {
            echo "<script> alert('Favor digitar um email válido.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        if(strlen($email) > 35 || strstr($email,'@') == FALSE)
        {
            echo "<script> alert('Favor digitar outro email. Limite de 35 caracteres atingido.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        if($confemail != $email)
        {
            echo "<script> alert('Favor digitar um email igual ao anterior.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        if($erro == 0) 
        { 
            $sql ="UPDATE usuarios SET nickname = '$nickname',nome = '$nome',datanasc = '$datanasc',email = '$email'"; 
            $sql .= "WHERE cod_usuario = '$cod_usuario';";
            //mysqli_query(<conexão>,<comando>);
            mysqli_query($mysqli,$sql);

            if($nickname != $usuario["nickname"]){
                echo "<script> alert(' Usuário atualizado com sucesso! \\n Como seu nickname foi alterado, faça login novamente.'); 
                window.location='index.php';</script> <br>";
            } else {
                echo "<script> alert('Usuário atualizado com sucesso!'); 
                javascript:history.go(-1);</script> <br>";
            }
        }
    }


    if($login == "alterar_senha")
    {
        $cod_usuario = $_POST["cod_usuario"];
        $senha_atual = $_POST["senha_atual"];
        $senha_nova = $_POST["senha_nova"];
        $conf_senhanova = $_POST["conf_senhanova"];
        $erro = 0;

        $senha_atual = htmlspecialchars($senha_atual);
        $senha_nova = htmlspecialchars($senha_nova);
        $conf_senhanova = htmlspecialchars($conf_senhanova);

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = '$cod_usuario';";
        $resposta = mysqli_query($mysqli, $sql);
        $usuario = mysqli_fetch_array($resposta);
    
        if(empty($senha_atual))
        {
            echo "<script> alert('Insira sua senha atual.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        if(!empty($senha_atual))
        {
            if(empty($senha_nova))
            {
                echo "<script> alert('Insira sua nova senha.'); 
                    javascript:history.go(-1);</script> <br>";
                $erro = 1;
            }

            if(!empty($senha_nova))
            {
                if(empty($conf_senhanova))
                {
                    echo "<script> alert('Confirme sua nova senha.'); 
                        javascript:history.go(-1);</script> <br>";
                    $erro = 1;
                }

                if(!empty($conf_senhanova))
                {
                    if(!password_verify($senha_atual, $usuario["senha"]))
                    {
                        echo "<script> alert('A senha atual está errada.'); 
                            javascript:history.go(-1);</script> <br>";
                        $erro = 1;
                    }

                    if(strlen($senha_nova) < 5 OR strlen($senha_nova) > 12)
                    {
                        echo "<script> alert('A nova senha deve possuir no mínimo 5 e no máximo 12 caracteres.'); 
                            javascript:history.go(-1);</script> <br>";
                        $erro = 1;
                    }

                    if($senha_nova != $conf_senhanova)
                    {
                        echo "<script> alert('A nova senha não foi repetida corretamente.'); 
                            javascript:history.go(-1);</script> <br>";
                        $erro = 1;
                    }
                }
            }
        }
        
        if($erro == 0) 
        { 
            $senha_cript = password_hash($senha_nova, PASSWORD_DEFAULT);
            $sql ="UPDATE usuarios SET senha = '$senha_cript'"; 
            $sql .= "WHERE cod_usuario = '$cod_usuario';";
            //mysqli_query(<conexão>,<comando>);
            mysqli_query($mysqli,$sql);

            echo "<script> alert(' Senha atualizada com sucesso! \\n Faça login novamente.'); 
                window.location='index.php';</script> <br>";
        }

    }


    if($login == "alterar_postagem")
    {
        $texto_post = $_POST["texto_post"];
        $cod_postagem = $_POST["cod_postagem"];
        $erro = 0;
        $texto_post = htmlspecialchars($texto_post);

        if(empty($texto_post))
        {
            echo "<script> alert('Insira seu argumento'); 
            javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        /*if(trim($texto_post))
        {
            echo "Insira seu argumento <br>";
            $erro = 1;
        }*/

        if($erro == 0)
        {
            $sql ="UPDATE postagens SET texto_post = '$texto_post'"; 
            $sql .= "WHERE cod_postagem = $cod_postagem;";
            mysqli_query($mysqli,$sql);

            /*$sql2 = "SELECT * FROM postagens";
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
            }*/

            echo "<script> alert('Postagem atualizada com sucesso!'); 
                javascript:history.go(-1);</script> <br>";
        }

    }


    if($login == "alterar_comentario")
    {
        $texto_coment = $_POST["texto_coment"];
        $cod_comentario = $_POST["cod_comentario"];
        $erro = 0;
        $texto_coment = htmlspecialchars($texto_coment);

        if(empty($texto_coment))
        {
            echo "<script> alert('Insira seu argumento'); 
            javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        /*if(trim($texto_post))
        {
            echo "Insira seu argumento <br>";
            $erro = 1;
        }*/

        if($erro == 0)
        {
            $sql ="UPDATE comentarios SET texto_coment = '$texto_coment'"; 
            $sql .= "WHERE cod_comentario = $cod_comentario;";
            mysqli_query($mysqli,$sql);

            /*$sql2 = "SELECT * FROM postagens";
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
            }*/

            echo "<script> alert('Comentário atualizado com sucesso!'); 
            javascript:history.go(-1);</script> <br>";
        }

    }

    

    mysqli_close($mysqli);

?>
