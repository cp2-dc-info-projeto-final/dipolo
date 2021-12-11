<?php
include "autentica.php";
include "return_dados.php";
include "conecta_mysql.php";

$cod_postagem = $_GET["cod_postagem"];

$sql ="SELECT * FROM postagens WHERE cod_postagem = $cod_postagem;"; 
$resposta = mysqli_query($mysqli,$sql);
$postagem = mysqli_fetch_array($resposta);

?>
<html>
<head>
    <title>Página inicial</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="col-7">
        <form action="recebe_comentario.php" method="POST">
            <input type="hidden" name="cod_usuario" value="<?php echo return_dados("cod_usuario", ""); ?>">
            <input type="hidden" name="cod_postagem" value="<?php echo $cod_postagem ?>">
            <textarea class="form-control mb-3" name="texto_coment" rows="5" maxlength="350" placeholder="Argumente aqui" required></textarea>
            <button type="submit" class="btn btn-outline-primary btn-lg">Criar comentário</button>
        </form>
    </div>
</body>
</html>