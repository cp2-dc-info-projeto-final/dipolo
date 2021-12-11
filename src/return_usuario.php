<?php

function return_usuario($cod_usuario)
{
    include "conecta_mysql.php";

    if ($nickname == "") {
        $nickname = $_SESSION["nickname"];
        $nickname = htmlspecialchars($nickname);
    }

    $sql = "SELECT * FROM usuarios WHERE nickname LIKE '$nickname';";
    $resposta = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_array($resposta);

    return $usuario;
}
