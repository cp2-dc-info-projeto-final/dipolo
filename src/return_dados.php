<?php
function return_dados($dado, $nick)
{
    include "conecta_mysql.php";

    if ($nick == "") {
        $nick = $_SESSION["nickname"];
        $nick = htmlspecialchars($nick);
    }

    $sql = "SELECT * FROM usuarios WHERE nickname LIKE '$nick';";
    $resposta = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_array($resposta);

    if ($dado == "nickname") {
        return $usuario["nickname"];
    } elseif ($dado == "nome") {
        return $usuario["nome"];
    } elseif ($dado == "email") {
        return $usuario["email"];
    } elseif ($dado == "datanasc") {
        return $usuario["datanasc"];
    } elseif ($dado == "adm") {
        return $usuario["adm"];
    } elseif ($dado == "cod_usuario") {
        return $usuario["cod_usuario"];
    }
}
?>