<?php
    include "autentica.inc";
    include "conecta_mysql.inc";

    $cod_usuario = $_GET["cod_usuario"];

    $sql ="SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;"; 
    $resposta = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($resposta);
?>

<html>
    <head>
        <title>Alterar Usuário</title>
    </head>

    <body>
        <p><strong>Atualização de Dados</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="login" value="alterar">
            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">

            <p>Nickname: <input type="text" name="nickname" size="10" maxlength="10" 
            value="<?php echo $usuario["nickname"]?>" required ></p>
        
            <p>Nome Completo: <input type="text" name="nome" size="30" maxlength="100" 
            value="<?php echo $usuario["nome"]?>" required></p>

            <p>Data de Nascimento: <input type="date" name="datanasc" 
            value="<?php echo $usuario["datanasc"]?>" required></p>

            <p>Email: <input type="text" name="email" size="30" maxlength="35"
            value="<?php echo $usuario["email"]?>" required></p>

            <p>*Confirmar Email: <input type="text" name="confemail" size="30" maxlength="35" required></p>

            <p>*Senha Atual: <input type="password" name="senha_atual" maxlength="12"></p>

            <p>Nova Senha: <input type="password" name="senha_nova" maxlength="12"></p>

            <p>Confirmar Senha Nova: <input type="password" name="conf_senhanova" maxlength="12"></p>

            <p>Se for um administrador, insira novamente seu código <br>
            *Código de Administrador: <input type="password" name="codadm"></p>

            <p>(*Campos Obrigatórios)</p>
 
            <p><input type="submit" value="Confirmar Alterações"></p>
            <br><a href='index.php'> Voltar para tela inicial </a>
        </form>

    <body>
</html>
