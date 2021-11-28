<?php
include "autentica.php";
include "conecta_mysql.php";
include "return_dados.php";

if ($_SESSION["fez_login"]) {
    if (!isset($_POST['usuario_alvo'])) {
        $sql = "DELETE FROM usuarios WHERE cod_usuario = $cod_usuario;";
        mysqli_query($mysqli, $sql);
        header("Location: index.php");
    } else if (return_dados("adm", "")) {
        $sql = "DELETE FROM usuarios WHERE nickname LIKE \"" . $_POST['usuario_alvo'] . "\";";
        mysqli_query($mysqli, $sql);
        header("Location: admin_dashboard.php");
    }
}

/*$login = $_POST["login"];

if($login == "exclui_conta")
{
    $cod_usuario = $_POST["cod_usuario"];
    $sql ="DELETE FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    mysqli_query($mysqli,$sql);
    header("Location: index.php");
}*/

mysqli_close($mysqli);
?>