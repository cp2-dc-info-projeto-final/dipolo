<?php include "autentica.php"; ?>
<?php include "return_dados.php"; ?>
<?php include "admin_listar.php"; ?>

<html>

<head>
    <title>Página do administrador - Dipolo</title>
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php if (return_dados("adm", "")) : ?>

        <!-- Navbar -->

        <?php
        ob_start();
        include 'navbar.php';
        echo ob_get_clean();
        ?>

        <!-- Conteúdo -->

        <div class="container-flex p-5 py-5">
            <div class="container-flex pb-2">
                <div class="row justify-content-evenly px-4">
                    <h1 class="text-center mb-5 fw-bold">Página do administrador</h1>
                    <div class="row justify-content-evenly px-4">
                        <div class="col-3 border border-dark rounded p-4 mb-auto">
                            <div class="border-bottom border-dark">
                                <h4>Postagens</h4>
                            </div>
                            <div>
                                <p class="mt-3">A ser implementada.</p>
                            </div>
                        </div>
                        <div class="col-3 border border-dark rounded p-4 mb-auto">
                            <div class="border-bottom border-dark">
                                <h4>Comentários</h4>
                            </div>
                            <div>
                                <p class="mt-3">A ser implementada.</p>
                            </div>
                        </div>
                        <div class="col-3 border border-dark rounded p-4 mb-auto">
                            <div class="border-bottom border-dark">
                                <h4>Usuários</h4>
                            </div>
                            <div>
                                <?php admin_listar_usuarios(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <?php include 'footer.html'; ?>

    <?php
    else : header("Location: index.php");
    endif;
    ?>

</body>

</html>