<?php

    include "conecta_mysql.php";

    $login = $_POST["login"];

    if($login == "buscar_nickname")
    {
        $nick = $_POST["nick"];
        $nick = htmlspecialchars($nick);
        $erro = 0;
                
        $sql ="SELECT * FROM usuarios WHERE nickname LIKE '%$nick%';"; 
        $resposta_busca = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta_busca);

        if(empty($nick))
        {
            echo "Insira um nickname válido";
            $erro = 1;
        }
 
        if($erro == 0)
        {
            include "pagina_base_inicio.php";
            echo "<div class=\"row justify-content-center\"><div class=\"col-3\">";
            if($linhas == 0)
            {
                echo "Nenhum usuário foi encontrado";
            }

            for($i = 0; $i < $linhas; $i++)
            {
                $usuario = mysqli_fetch_assoc($resposta_busca);
                include "busca_usuario_template.php";
                //echo "<a href='#pagina_do_respectivo_usuario'>". $usuario["nickname"] . "</a> <br>";
                //colocar nickname já como link para a página do usuário buscado?
                //aparecer as opções de usuários em um dropdown?
            }
            echo "</div></div>";
            include "pagina_base_final.php";
        }
    }



    if($login == "buscar_usuarios")
    {
        $nick = $_POST["nick"];
        $nick = htmlspecialchars($nick);
        $erro = 0;
                
        $sql ="SELECT * FROM usuarios WHERE nickname LIKE '%$nick%';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);

        if(empty($nick))
        {
            echo "Insira um nickname válido";
            $erro = 1;
        }

        if($erro == 0)
        {
            if($linhas == 0)
            {
                echo "Nenhum usuário foi encontrado";
            }

            for($i = 0; $i < $linhas; $i++)
            {
                $usuario = mysqli_fetch_array($resposta);
                echo $usuario["nickname"]."<br><br>";
                //echo "<a href='#pagina_do_respectivo_usuario'>". $usuario["nickname"] . "</a> <br>";
                //colocar nickname já como link para a página do usuário buscado?
                //aparecer as opções de usuários em um dropdown?
            }
        }
          
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
    }



    if($login == "buscar_postagens")
    {
        $post = $_POST["post"];
        $post = htmlspecialchars($post);
        $erro = 0;
                
        $sql ="SELECT * FROM postagens WHERE texto_post LIKE '%$post%';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);

        if(empty($post))
        {
            echo "Insira um texto válido";
            $erro = 1;
        }

        if($erro == 0)
        {
            if($linhas == 0)
            {
                echo "Nenhuma postagem foi encontrada";
            }

            for($i = 0; $i < $linhas; $i++)
            {
                $postagem = mysqli_fetch_array($resposta);
                echo $postagem["texto_post"]."<br><br>";
                //echo "<a href='#pagina_do_respectivo_usuario'>". $usuario["nickname"] . "</a> <br>";
                //colocar nickname já como link para a página do usuário buscado?
                //aparecer as opções de usuários em um dropdown?
            }
        }
          
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
    }


    
    if($login == "buscar_comentarios")
    {
        $coment = $_POST["coment"];
        $coment = htmlspecialchars($coment);
        $erro = 0;
                
        $sql ="SELECT * FROM comentarios WHERE texto_coment LIKE '%$coment%';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);

        if(empty($coment))
        {
            echo "Insira um texto válido";
            $erro = 1;
        }

        if($erro == 0)
        {
            if($linhas == 0)
            {
                echo "Nenhum comentário foi encontrado";
            }

            for($i = 0; $i < $linhas; $i++)
            {
                $comentario = mysqli_fetch_array($resposta);
                echo $comentario["texto_coment"]."<br><br>";
                //echo "<a href='#pagina_do_respectivo_usuario'>". $usuario["nickname"] . "</a> <br>";
                //colocar nickname já como link para a página do usuário buscado?
                //aparecer as opções de usuários em um dropdown?
            }
        }
          
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
    }


?>
