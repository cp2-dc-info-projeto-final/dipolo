<?php
include "autentica.php";
include "conecta_mysql.php";

$cod_usuario = $_GET["cod_usuario"];

$sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
$resposta = mysqli_query($mysqli, $sql);
$usuario = mysqli_fetch_array($resposta);
?>

<html>

<head>
    <title>Alterar Usuário</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Navbar -->

    <?php
    ob_start();
    include 'navbar.php';
    echo ob_get_clean();
    ?>

    <!-- Conteúdo -->

    <p><strong>Atualização de Dados</strong></p>
    <form action="recebe_dados.php" method="POST">
        <input type="hidden" name="login" value="alterar">
        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">

        <p>Nickname: <input type="text" name="nickname" size="10" maxlength="10" value="<?php echo $usuario["nickname"] ?>" required></p>

        <p>Nome Completo: <input type="text" name="nome" size="30" maxlength="100" value="<?php echo $usuario["nome"] ?>" required></p>

        <p>Data de Nascimento: <input type="date" name="datanasc" value="<?php echo $usuario["datanasc"] ?>" required></p>

        <p>Email: <input type="text" name="email" size="30" maxlength="35" value="<?php echo $usuario["email"] ?>" required></p>

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

    <!-- Footer -->

    <?php echo file_get_contents('footer.html') ?>

    <body>

</html>