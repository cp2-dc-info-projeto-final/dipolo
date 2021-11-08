<?php

    include "conecta_mysql.php";

    $login = $_POST["login"];

    if($login == "buscar_usuarios")
    {
        $nick = $_POST["nick"];
        $nick = htmlspecialchars($nick);
                
        $sql ="SELECT * FROM usuarios WHERE nickname LIKE '%$nick%';"; 
        $resposta = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($resposta);

        if($linhas == 0)
        {
            echo "Nenhum usuário foi encontrado";
        }

        for($i = 0; $i < $linhas; $i++)
        {
            $usuario = mysqli_fetch_array($resposta);
            echo $usuario["nickname"]."<br><br>";
            //echo "<a href='index.php'>". $usuario["nickname"] . "</a> <br>";
            //colocar nickname já como link para a página do usuário buscado?
            //aparecer as opções de usuários em um dropdown?
        }
          
        echo "<br><Br><a href='index.php'> Voltar para tela inicial </a>";
    }

    mysqli_close($mysqli);

?>