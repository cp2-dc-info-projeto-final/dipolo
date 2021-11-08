<?php
    include "conecta_mysql.php";

    $login = $_POST["login"];

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
