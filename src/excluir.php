<?php
    include "autentica.php";
    include "conecta_mysql.php";

    $cod_usuario = $_GET["cod_usuario"];

    $sql ="SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    $resposta = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($resposta);
?>

<html>
    <head>
        <title>Excluir Conta</title>
    </head>

    <body>

        <p><strong>Confirmar Exclusão?</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="login" value="excluir">
            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
            <p><input type="submit" value="Excluir"></p>
        </form>

        <br><br><a href='login.php'> Voltar para tela principal </a>

    <body>
</html>
