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
        // Quando for 0, é falso
        $adm = 0;
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
            echo "<script> alert('Nickname já existente.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if(strlen($nickname) < 3 OR strlen($nickname) > 10)
        {
            echo "<script> alert('O nickname deve possuir no mínimo 3 e no máximo 10 caracteres.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if(empty($nome) OR strstr($nome,' ') == FALSE)
        {
            echo "<script> alert('Favor digitar seu nome corretamente.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if(strlen($email) < 8 || strstr($email,'@') == FALSE)
        {
            echo "<script> alert('Favor digitar seu email corretamente.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if(strlen($email) > 35 || strstr($email,'@') == FALSE)
        {
            echo "<script> alert('Favor digitar outro email. Limite de 35 caracteres atingido.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if($confemail != $email)
        {
            echo "<script> alert('Favor digitar um email igual ao anterior.'); 
                javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if(strlen($senha) < 5 OR strlen($senha) > 12)
        {
            echo "<script> alert('A senha deve possuir no mínimo 5 e no máximo 12 caracteres.'); 
            javascript:history.go(-1);</script> <br>";
            $erro = 1;
        }

        else if($confsenha != $senha)
        {
            echo "<script> alert('Favor digitar uma senha igual à anterior.'); 
                javascript:history.go(-1);</script> <br>";
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

            echo "<script> alert(' Usuário cadastrado com sucesso! \\n Faça login e aproveite!'); 
                window.location='index.php';</script> <br>";
        }
    }

    mysqli_close($mysqli);

?>