<?php
include "autentica.php";
include "conecta_mysql.php";
include "return_dados.php";

if ($_SESSION['fez_login'] && return_dados("adm", "")) {
    if (isset($_POST['usuario_alvo'])) {
        if (return_dados("adm", $_POST['usuario_alvo'])) {
            $sql = "UPDATE usuarios SET adm = 0 WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
            mysqli_query($mysqli, $sql);
        } else {
            $sql = "UPDATE usuarios SET adm = 1 WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
            mysqli_query($mysqli, $sql);
        }
    }
    header("Location: admin_dashboard.php");
} else {
    header("Location: index.php");
}
