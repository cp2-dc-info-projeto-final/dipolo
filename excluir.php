<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $nickname = $_SESSION["nickname"];

    $sql ="SELECT * FROM usuarios WHERE nickname = '$nickname';"; 
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
            <input type="hidden" name="nick" value="<?php echo $nickname?>">
            <p><input type="submit" value="Excluir"></p>
        </form>

        <br><br><a href='login.html'> Voltar para tela principal </a>

    <body>
</html>