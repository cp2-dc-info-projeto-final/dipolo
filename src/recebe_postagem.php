<?php

include "conecta_mysql.php";

$publi = $_POST["publi"];

if($publi == "post")
{
    $texto_post = $_POST["texto_post"];
    $cod_usuario = $_POST["cod_usuario"];

    $texto_post = htmlspecialchars($texto_post);

    $sql1 ="SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    $resposta = mysqli_query($mysqli,$sql1);
    $usuario = mysqli_fetch_array($resposta);

    $sql2 ="INSERT INTO postagens (cod_postagem, texto_post, cod_usuario)"; 
    $sql2 .= "VALUES (NULL, '$texto_post', $cod_usuario);";
    mysqli_query($mysqli,$sql2);
    header("Location: index.php");


}

?>