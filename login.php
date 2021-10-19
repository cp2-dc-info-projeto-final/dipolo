<?php
    // Recebe os campos do formulário
    $nickname = $_POST["nickname"];
    $senha = $_POST["senha"];

    // Realiza a consulta no banco de dados
    include "conecta_mysql.inc";
    $sql = "SELECT * FROM usuarios WHERE nickname = '$nickname';";
    $resposta = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($resposta) != 1){ // testa se não encontrou o nickname
        echo "Nickname inválido!";
        echo "<p><a href='login.html'>Página de login</a></p>";
    }
    
    else{
        $usuario = mysqli_fetch_array($resposta);
        if($senha != $usuario["senha"]){ // testa se a senha está errada
            echo "Senha inválida!";
            echo "<p><a href='login.html'>Página de login</a></p>";
        }
        else{ // usuário e senha corretos, abre a sessão
            session_start();
            $_SESSION["nickname"] = $nickname;
            $_SESSION["senha"] = $senha;
            // direciona à página inicial
            header("Location: index.php");
        }
    }
    mysqli_close($mysqli);
?>