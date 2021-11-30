<?php
include "conecta_mysql.php";

$login = $_POST["login"];

if($login == "exclui_conta")
{
    $cod_usuario = $_POST["cod_usuario"];
    $sql ="DELETE FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    mysqli_query($mysqli,$sql);
    header("Location: index.php");
}

mysqli_close($mysqli);
?> 