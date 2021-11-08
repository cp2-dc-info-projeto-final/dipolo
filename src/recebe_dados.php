<?php
    include "conecta_mysql.php";

    $login = $_POST["login"];

    if($login == "cadastrar")
    {
        $nickname = $_POST["nickname"];
        $nome = $_POST["nome"];
        $datanasc = $_POST["datanasc"];
        $email = $_POST["email"];
        $confemail = $_POST["confemail"];
        $senha = $_POST["senha"];
        $confsenha = $_POST["confsenha"];
        $codadm = $_POST["codadm"];
        $adm = FALSE;
        $erro = 0;

        $nickname = htmlspecialchars($nickname);
        $nome = htmlspecialchars($nome);
        $email = htmlspecialchars($email);
        $confemail = htmlspecialchars($confemail);
        $senha = htmlspecialchars($senha);
        $confsenha = htmlspecialchars($confsenha);
        $codadm = htmlspecialchars($codadm);

        $sql ="SELECT * FROM usuarios WHERE nickname LIKE '$nickname';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);

        if($linhas != 0)
        {
            echo "Nickname já existente.<br>";
            $erro = 1;
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

        if(strlen($senha) < 5 OR strlen($senha) > 12)
        {
            echo "A senha deve possuir no mínimo 5 e no máximo 12 caracteres.<br>";
            $erro = 1;
        }

        if($confsenha != $senha)
        {
            echo "Favor digitar uma senha igual à anterior.<br>";
            $erro = 1;
        }
        
        if($codadm == "adm@dipolo")
        {
            $adm = TRUE;
        }

        if($erro == 0) 
        { 
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql ="INSERT INTO usuarios (nickname,nome,datanasc,email,senha,adm)"; 
            $sql .= "VALUES ('$nickname','$nome','$datanasc','$email','$senha_cript','$adm');";

            //mysqli_query(<conexão>,<comando>);
            mysqli_query($mysqli,$sql);


            //como informar ao usuário que o nickname já existe?

            echo "Usuário cadastrado com sucesso!"; 
            echo "<br><Br><a href='login_cadastro.php'> Fazer Login </a>";
        }
    }

    /*if($login == "exibir")
    {
        $nick = $_POST["nick"];
        $nick = htmlspecialchars($nick);

        $sql ="SELECT * FROM usuarios WHERE nickname LIKE '$nick';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);
        $usuario = mysqli_fetch_array($resposta);

        /*echo "Nickname: ". $usuario["nickname"]. "<br>";
        echo "Nome Completo: ". $usuario["nome"]. "<br>";
        echo "Data de Nascimento: ". $usuario["datanasc"]. "<br>";
        echo "Email: ". $usuario["email"]. "<br>";
        echo "Administrador: ". $usuario['adm']. "<br>";

        //?cod_usuario=".$usuario["cod_usuario"]."
        echo "<a href='alteracao.php?cod_usuario=".$usuario["cod_usuario"]."'> Alterar Usuário </a> <br>"; 
        echo "<a href='excluir.php?cod_usuario=".$usuario["cod_usuario"]."'> Excluir Usuário </a> <br>";
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";/*
                
    }*/

    if($login == "excluir")
    {
        $cod_usuario = $_POST["cod_usuario"];

        $sql ="DELETE FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
        mysqli_query($mysqli,$sql);

        echo "Usuário deletado com sucesso";
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
    }

    mysqli_close($mysqli);

?>
