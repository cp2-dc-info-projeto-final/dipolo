<?php

include "conecta_mysql.php";

$publi = $_POST["publi"];

if($publi == "coment")
{
    $texto_coment = $_POST["texto_coment"];
    $cod_usuario = $_POST["cod_usuario"];

    $texto_coment = htmlspecialchars($texto_coment);

    $sql1 ="SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    $resposta = mysqli_query($mysqli,$sql1);
    $usuario = mysqli_fetch_array($resposta);

    $sql2 ="INSERT INTO comentarios (cod_comentario, texto_coment, cod_usuario)"; 
    $sql2 .= "VALUES (NULL, '$texto_coment', $cod_usuario);";
    mysqli_query($mysqli,$sql2);

    $sql3 = "SELECT nickname, texto_coment";
    $sql3 .= "FROM usuarios, comentarios";
    $sql3 .= "WHERE usuarios.cod_usuario = comentarios.cod_usuario;";
    $post = mysqli_query($mysqli,$sql3);
    header("Location: index.php");
}

?>