<?php
    include "autentica.php";
    include "return_dados.php";
    include "conecta_mysql.php";

    $publi = $_POST["publi"];

    if($publi == "timeline")
    {
        $cod_usuario = $_POST["cod_usuario"];

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
        $resposta = mysqli_query($mysqli,$sql);

        $sql2 = "SELECT * FROM postagens WHERE cod_usuario = $cod_usuario";
        $resposta2 = mysqli_query($mysqli, $sql2);

        $sql3 = "SELECT * FROM timeline WHERE cod_usuario = $cod_usuario";
        $resposta3 = mysqli_query($mysqli,$sql3);    
        $linhas = mysqli_num_rows($resposta3);

        $time = mysqli_fetch_array($resposta);
        $nick = $time["nickname"];

        if($linhas == 0)
        {
            echo "Não existem postagens";
        }

        for($i = 0; $i < $linhas; $i++)
        {
            $line = mysqli_fetch_array($resposta2);
            $cod_postagem = $line["cod_postagem"];
            $text_post = $line["texto_post"];

            $selectCurtidas = "SELECT * FROM curtidas_postagens WHERE cod_postagem = $cod_postagem";
            $selecionar_curtidas = mysqli_query($mysqli,$selectCurtidas);
            $conta_curtidas = mysqli_num_rows($selecionar_curtidas);

            if($conta_curtidas == 1){
                $conta_curtidas = $conta_curtidas." curtiu";
            } else if($conta_curtidas > 1){
                $conta_curtidas = $conta_curtidas." curtiram";
            }

            echo "Nick do usuário: $nick <br>";
            echo "Post do usuario: $text_post <br>";

            $sql4 = "SELECT * FROM curtidas_postagens WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem";
            $resposta4 = mysqli_query($mysqli,$sql4);
            $linhas2 = mysqli_num_rows($resposta4);

            if($_SESSION["nickname"] == $nick)
            {
                echo "<a href='alteracao_postagem.php?cod_postagem=".$cod_postagem.
                        "'> Editar postagem </a> <br>";

                echo "<link href='css/main.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
                    
                        <button type= button' data-bs-toggle='modal' data-bs-target='#excluirModalPost'>
                                Excluir postagem
                        </button><br>
                        
                        <div class='modal fade' id='excluirModalPost' tabindex='-1'aria-labelledby='excluirModalLabelPost' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h4 class='modal-title' id='excluirModalLabelPost'>Confirmar exclusão?</h4>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form action='excluir_postagem.php' method='POST'>
                                            <input type='hidden' name='cod_postagem' value='$cod_postagem'>
                                            <button type='submit' class='btn btn-primary'>Excluir postagem</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> ";
            }

            echo "<a href='comentario.php?cod_postagem=".$cod_postagem.
                    "'> Comentar </a> <br>";
            echo "<a href='exibir_comentario.php?cod_postagem=".$cod_postagem.
                    "'> Ver cometários </a> <br>";

            if($linhas2 != 0){
                echo "<code><spam>*curtidas* </spam>".$conta_curtidas."</code><br>
                        <a href='curtidas_postagens.php?cod_postagem=".$cod_postagem.
                        "'> Deslike </a> <br><br>";   
            } else {
                echo "<code><spam>*curtidas* </spam>".$conta_curtidas."</code><br>
                        <a href='curtidas_postagens.php?cod_postagem=".$cod_postagem.
                        "'> Like </a> <br><br>"; 
            }
        
        }

        echo "<br><Br><a href='index.php'> Voltar para a página inicial </a>";

    }

    mysqli_close($mysqli);

?>