<!--Página temporária-->
<!--Barras de busca a serem inseridas na página do administrador-->

<form action="recebe_busca.php" method="POST" class="d-flex ms-auto my-2 my-lg-0 me-4">
    <input type="hidden" name="login" value="buscar_usuarios">
    <input class="form-control me-2" name="nick" type="search" placeholder="Usuário" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
</form>

<br><br><br>

<form action="recebe_busca.php" method="POST" class="d-flex ms-auto my-2 my-lg-0 me-4">
    <input type="hidden" name="login" value="buscar_postagens">
    <input class="form-control me-2" name="post" type="search" placeholder="Postagem" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
</form>

<br><br><br>

<form action="recebe_busca.php" method="POST" class="d-flex ms-auto my-2 my-lg-0 me-4">
    <input type="hidden" name="login" value="buscar_comentarios">
    <input class="form-control me-2" name="coment" type="search" placeholder="Comentário" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
</form>

<br><br><br>