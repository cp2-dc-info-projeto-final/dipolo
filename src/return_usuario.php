<?php

function return_usuario($cod_usuario)
{
    include "conecta_mysql.php";

    if ($cod_usuario == null) {
        $cod_usuario = $_SESSION["cod_usuario"];
        $cod_usuario = htmlspecialchars($cod_usuario);
    }

    $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
    $resposta = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_array($resposta);

    if ($usuario["caminho_img"] == null) {
        $usuario["caminho_img"] = "../imagens/no-image.svg";
    }

    return $usuario;
}
