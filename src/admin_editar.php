<?php
include "autentica.php";
include "conecta_mysql.php";
include "return_dados.php";

if ($_SESSION['fez_login'] && return_dados("adm", "", $mysqli)) {
    if (isset($_POST['usuario_alvo'])) {
        $sql = "SELECT * FROM usuarios WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
        $resposta = mysqli_query($mysqli, $sql);
        $usuario = mysqli_fetch_array($resposta);

        $sql = "UPDATE usuarios SET ";

        if (!empty($_POST['nickname']) && $_POST['nickname'] != $usuario["nickname"]) {
            $sql .= "nickname = \"" . $_POST['nickname'] . "\"";
        }

        if (!empty($_POST['nome']) && $_POST['nome'] != $usuario["nome"]) {
            if ($sql != "UPDATE usuarios SET ") {
                $sql .= ", ";
            }
            $sql .= "nome = \"" . $_POST['nome'] . "\"";
        }

        if (!empty($_POST['datanasc']) && $_POST['datanasc'] != $usuario["datanasc"]) {
            if ($sql != "UPDATE usuarios SET ") {
                $sql .= ", ";
            }
            $sql .= "datanasc = \"" . $_POST['datanasc'] . "\"";
        }

        if (!empty($_POST['email']) && $_POST['email'] != $usuario["email"]) {
            if ($sql != "UPDATE usuarios SET ") {
                $sql .= ", ";
            }
            $sql .= "email = \"" . $_POST['email'] . "\"";
        }

        if (!empty($_POST['senha']) && !password_verify($_POST['senha'], $usuario["senha"])) {
            if ($sql != "UPDATE usuarios SET ") {
                $sql .= ", ";
            }
            $senha_cript = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $sql .= "senha = '$senha_cript'";
        }
        $sql .= " WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
        mysqli_query($mysqli, $sql);
    }
    header("Location: admin_dashboard.php");
} else {
    header("Location: index.php");
}

mysqli_close($mysqli);