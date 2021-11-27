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
                echo "Nickname já existente.<br>";
                $erro = 1;
            }
        }

        if(strlen($nickname) < 3 OR strlen($nickname) > 10)
        {
            echo "O nickname deve possuir no mínimo 3 e no máximo 10 caracteres.<br>";
            $erro = 1;
        }

        if(empty($nome) OR strstr($nome,' ') == FALSE)
        {
            echo "Favor digitar seu nome corretamente. <br>";
            $erro = 1;
        }

        if(strlen($email) < 8 || strstr($email,'@') == FALSE)
        {
            echo "Favor digitar seu email corretamente. <br>";
            $erro = 1;
        }

        if(strlen($email) > 35 || strstr($email,'@') == FALSE)
        {
            echo "Favor digitar outro email. Limite de 35 caracteres atingido. <br>";
            $erro = 1;
        }

        if($confemail != $email)
        {
            echo "Favor digitar um email igual ao anterior. <br>";
            $erro = 1;
        }

        if($erro == 0) 
        { 
            $sql ="UPDATE usuarios SET nickname = '$nickname',nome = '$nome',datanasc = '$datanasc',email = '$email'"; 
            $sql .= "WHERE cod_usuario = '$cod_usuario';";
            //mysqli_query(<conexão>,<comando>);
            mysqli_query($mysqli,$sql);

            echo "Usuário atualizado com sucesso!<br>"; 
            echo "<br><Br><a href='index.php'> Voltar para a página inicial </a>";
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
            echo "Insira sua senha atual.<br>";
            $erro = 1;
        }

        if(!empty($senha_atual))
        {
            if(empty($senha_nova))
            {
                echo "Insira sua nova senha.<br>";
                $erro = 1;
            }

            if(!empty($senha_nova))
            {
                if(empty($conf_senhanova))
                {
                    echo "Confirme sua nova senha.<br>";
                    $erro = 1;
                }

                if(!empty($conf_senhanova))
                {
                    if(!password_verify($senha_atual, $usuario["senha"]))
                    {
                        echo "A senha atual está errada.<br>";
                        $erro = 1;
                    }

                    if(strlen($senha_nova) < 5 OR strlen($senha_nova) > 12)
                    {
                        echo "A nova senha deve possuir no mínimo 5 e no máximo 12 caracteres.<br>";
                        $erro = 1;
                    }

                    if($senha_nova != $conf_senhanova)
                    {
                        echo "A nova senha não foi repetida corretamente.<br>";
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

            echo "Senha atualizada com sucesso!<br>"; 
            echo "Faça login novamente.";
            echo "<br><Br><a href='index.php'> Fazer Login </a>";
        }

    }


    

    mysqli_close($mysqli);

?>
