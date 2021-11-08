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
            echo "<br><Br><a href='index.php'> Fazer Login </a>";
        }
    }

    mysqli_close($mysqli);

?>