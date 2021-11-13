<?php
include "autentica.php";
include "conecta_mysql.php";
include "return_dados.php";

if ($_SESSION['fez_login'] && return_dados("adm", "")) {
    if (isset($_POST['usuario_alvo'])) {
        $sql = "SELECT * FROM usuarios WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
        $resposta = mysqli_query($mysqli, $sql);
        $usuario = mysqli_fetch_array($resposta);

        if ($_POST['nickname'] != null && $_POST['nickname'] != return_dados("nickname", $_POST['usuario_alvo']) && $_POST['nickname'] != $usuario["nickname"]) {
            $sql_nickname = "UPDATE usuarios SET nickname = \"" . $_POST['nickname'] . "\" WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
            mysqli_query($mysqli, $sql_nickname);
        }
    }
    header("Location: admin_dashboard.php");
} else {
    header("Location: index.php");
}
