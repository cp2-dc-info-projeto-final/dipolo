<?php
    include "conecta_mysql.inc";

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
        $adm = "NÃO";
        $erro = 0;

        $nickname = htmlspecialchars($nickname);
        $nome = htmlspecialchars($nome);
        $email = htmlspecialchars($email);
        $confemail = htmlspecialchars($confemail);
        $senha = htmlspecialchars($senha);
        $confsenha = htmlspecialchars($confsenha);
        $codadm = htmlspecialchars($codadm);

        if(strlen($nickname) < 3)
        {
            echo "O nickname deve possuir no mínimo 3 caracteres.<br>";
            $erro = 1;
        }

        if(strlen($nickname) > 10)
        {
            echo "O nickname deve possuir no máximo 10 caracteres.<br>";
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
            echo "Favor digitar outro email. Limite de caracteres atingido. <br>";
            $erro = 1;
        }

        if($confemail != $email)
        {
            echo "Favor digitar um email igual ao anterior. <br>";
            $erro = 1;
        }

        if(strlen($senha) < 5)
        {
            echo "A senha deve possuir no mínimo 5 caracteres.<br>";
            $erro = 1;
        }

        if(strlen($senha) > 12)
        {
            echo "A senha deve possuir no mínimo 5 caracteres.<br>";
            $erro = 1;
        }

        if($confsenha != $senha)
        {
            echo "Favor digitar uma senha igual à anterior.<br>";
            $erro = 1;
        }

        if($codadm == "adm@dipolo")
        {
            $adm = "SIM";
        }

        if($erro == 0) 
        { 
            $sql ="INSERT INTO usuarios (nickname,nome,datanasc,email,confemail,senha,confsenha,adm)"; 
            $sql .= "VALUES ('$nickname','$nome','$datanasc','$email','$confemail','$senha','$confsenha','$adm');";

            //mysqli_query(<conexão>,<comando>);
            mysqli_query($mysqli,$sql);

            //como informar ao usuário que o nickname já existe?

            echo "Usuário cadastrado com sucesso!"; 
            echo "<br><Br><a href='login.html'> Fazer Login </a>";
        }
    }

    if($login == "alterar")
    {
        $nick = $_POST["nick"];
        $nickname = $_POST["nickname"];
        $nome = $_POST["nome"];
        $datanasc = $_POST["datanasc"];
        $email = $_POST["email"];
        $confemail = $_POST["confemail"];
        $senha = $_POST["senha"];
        $confsenha = $_POST["confsenha"];
        $codadm = $_POST["codadm"];
        $adm = "NÃO";
        $erro = 0;

        $nickname = htmlspecialchars($nickname);
        $nome = htmlspecialchars($nome);
        $email = htmlspecialchars($email);
        $confemail = htmlspecialchars($confemail);
        $senha = htmlspecialchars($senha);
        $confsenha = htmlspecialchars($confsenha);
        $codadm = htmlspecialchars($codadm);

        if(strlen($nickname) < 3)
        {
            echo "O nickname deve possuir no mínimo 3 caracteres.<br>";
            $erro = 1;
        }

        if(strlen($nickname) > 10)
        {
            echo "O nickname deve possuir no máximo 10 caracteres.<br>";
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
            echo "Favor digitar outro email. Limite de caracteres atingido. <br>";
            $erro = 1;
        }

        if($confemail != $email)
        {
            echo "Favor digitar um email igual ao anterior. <br>";
            $erro = 1;
        }

        if(strlen($senha) < 5)
        {
            echo "A senha deve possuir no mínimo 5 caracteres.<br>";
            $erro = 1;
        }

        if(strlen($senha) > 12)
        {
            echo "A senha deve possuir no mínimo 5 caracteres.<br>";
            $erro = 1;
        }

        if($confsenha != $senha)
        {
            echo "Favor digitar uma senha igual à anterior.<br>";
            $erro = 1;
        }

        if($codadm == "adm@dipolo")
        {
            $adm = "SIM";
        }

        if($erro == 0) 
        { 
            $sql ="UPDATE usuarios SET nickname = '$nickname',nome = '$nome',datanasc = '$datanasc', adm = '$adm',"; 
            $sql .= "email = '$email',confemail = '$confemail',senha = '$senha',confsenha = '$confsenha'";
            $sql .= "WHERE nickname = '$nick';";

            mysqli_query($mysqli,$sql);

            echo "Usuário atualizado com sucesso! <br>"; 
            echo "Faça login novamente se tiver alterado nickname e/ou senha.";
            echo "<br><br><a href='login.html'> Tela de Login </a>";
            echo "<br><a href='index.php'> Voltar para tela inicial </a>";
        }
    }

    if($login == "excluir")
    {
        $nick = $_POST["nick"];

        $sql ="DELETE FROM usuarios WHERE nickname = '$nick';"; 
        mysqli_query($mysqli,$sql);

        echo "Usuário deletado com sucesso";
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
    }

    if($login == "exibir")
    {
        $nickname = $_POST["nickname"];
        $nickname = htmlspecialchars($nickname);

        $sql ="SELECT * FROM usuarios WHERE nickname LIKE '$nickname';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);
        $usuario = mysqli_fetch_array($resposta);

        echo "Nickname: ". $usuario["nickname"]. "<br>";
        echo "Nome Completo: ". $usuario["nome"]. "<br>";
        echo "Data de Nascimento: ". $usuario["datanasc"]. "<br>";
        echo "Email: ". $usuario["email"]. "<br>";
        echo "Confirmar email: ". $usuario["confemail"]. "<br>";
        echo "Senha: ". $usuario["senha"]. "<br>";
        echo "Confirmar senha: ". $usuario["confsenha"]. "<br>";
        echo "Administrador: ". $usuario['adm']. "<br>";

        echo "<a href='alteracao.php'> Alterar Usuário </a> <br>"; 
        echo "<a href='excluir.php'> Excluir Usuário </a> <br>";
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
                
    }

    mysqli_close($mysqli);

?>