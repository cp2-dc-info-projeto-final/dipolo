<html>
    <head>
        <title>Cadastrar Usuário</title>
    </head>

    <body>
        <p><strong>FORMUÁRIO DE CADASTRO</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="login" value="cadastrar">

            <p>Nickname: <input type="text" name="nickname" size="10" maxlength="10" required></p>
        
            <p>Nome Completo: <input type="text" name="nome" size="30" maxlength="100" required></p>

            <p>Data de Nascimento: <input type="date" name="datanasc" required></p>

            <p>Email: <input type="text" name="email" size="30" maxlength="35" required></p>

            <p>Confirmar Email: <input type="text" name="confemail" size="30" maxlength="35" required></p>

            <p>Senha: <input type="password" name="senha" maxlength="12" required></p>

            <p>Confirmar Senha: <input type="password" name="confsenha" maxlength="12" required></p>

            <p>Se for um administrador, insira seu código <br>
            Código de Administrador: <input type="password" name="codadm"></p>
 
            <p><input type="submit" value="Enviar"></p>
        </form>

    </body>
</html>