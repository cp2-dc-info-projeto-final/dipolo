<?php

    include "conecta_mysql.php";
    include "upload.php";

    $imagem = $_POST["imagem"];

    if($imagem == "adicionar")
    {
        $cod_usuario = $_POST["cod_usuario"];
        $img_perfil = $_FILES["img_perfil"];
        $erro = 0;

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $usuario = mysqli_fetch_array($res);

        $caminho_img = upload_imagem($img_perfil);

        if($caminho_img === false){
            echo "Não foi possível carregar a imagem corretamente.<br>";
            $erro = 1;
        }
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
            if(!empty($usuario["caminho_img"])) unlink($usuario["caminho_img"]);
            $sql2 = "UPDATE usuarios SET caminho_img = '$caminho_img'";
            $sql2 .= "WHERE cod_usuario = $cod_usuario;";  
            mysqli_query($mysqli,$sql2);  
            echo "<br>A foto do perfil foi atualizada com sucesso!"; 
            echo "<br><br><a href='index.php'>Página Inicial</a>"; 
        }
        else{
            echo "<p><a href='atualiza_foto.php?cod_usuario=".$cod_usuario."'>Voltar para atualizar foto de perfil</a></p>";
        }
    }

    
    

?>