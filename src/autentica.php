<?php
    session_start();

    if(isset($_SESSION["nickname"])){
        $nickname = $_SESSION["nickname"];
    }

    if(isset($_SESSION["senha"])){
        $senha = $_SESSION["senha"];
    }

    if(empty($nickname) OR empty($senha)){
        echo "Você não fez o login!";
        echo "<p><a href='login.html'>Página de login</a></p>";
        exit;
    }

    else{
        include "conecta_mysql.php";
        $sql = "SELECT * FROM usuarios WHERE nickname = '$nickname';";
        $resposta = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($resposta) != 1){ // testa se não encontrou o username
            unset($_SESSION["nickname"]);
            unset($_SESSION["senha"]);
            echo "Você não fez o login!";
            echo "<p><a href='login.html'>Página de login</a></p>";
            exit;
        }

        else{
            $usuario = mysqli_fetch_array($resposta);
            if(!hash_equals($usuario["senha"], $senha)){ // testa se a senha está errada
                unset($_SESSION["nickname"]);
                unset($_SESSION["senha"]);
                echo "Você não fez o login!";
                echo "<p><a href='login.html'>Página de login</a></p>";
                exit;
            }
        }

        mysqli_close($mysqli);
    }
?>
