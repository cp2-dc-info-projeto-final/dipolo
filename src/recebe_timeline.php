<!--<//?php

include "conecta_mysql.php";

$publi = $_POST["publi"];

if($publi == "timeline")
{
    $sql = "SELECT nickname, texto_post";
    $sql .= "FROM usuarios, postagens";
    $sql .= "WHERE usuarios.".$cod_usuario." = postagens.".$cod_usuario.";";
    $resposta = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($resposta);

    for($i = 0; $i < $linhas; $i++)
    {
        $post = mysqli_fetch_array($resposta);
        echo "Nick do usuário ".$post["nickname"]. "<br>";
        echo "Post do usuario ".$post["texto_post"]. "<br><br>";
    }
}

?>-->