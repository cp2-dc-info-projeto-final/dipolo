<?php

function return_usuario($cod_usuario)
{
    include "conecta_mysql.php";

    if ($cod_usuario == null) {
        $cod_usuario = $_SESSION["nickname"];
        $cod_usuario = htmlspecialchars($cod_usuario);
    }

    $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
    $resposta = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_array($resposta);

    return $usuario;
}
