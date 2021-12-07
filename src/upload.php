<?php
    /*$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Arquivo já existente.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5e+6) {
        echo "Arquivo muito grande.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Somente arquivos JPEG, JPG e PNG são permitidos.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Arquivo não enviado.";
    // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "O arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviado.";
        } else {
            echo "Houve um erro ao enviar o arquivo.";
        }
    }*/
//------------------------------------------------------------------------------------------------------------------------------------------
    /*Função que armazena no servidor a imagem contida no parâmetro $fileToUpload.
    Retorna o caminho da imagem no servidor, se o upload tiver sido feito com sucesso.
    Caso contrário, retorna falso.
    Exemplo de chamada da função:
        $fileToUpload = $_FILES["img_perfil"];
        $caminho_img = upload_imagem($fileToUpload);*/

    function upload_imagem($fileToUpload){
        $target_dir = "uploads/"; // pasta do servidor onde as imagens devem ser salvas
        $uploadOk = 1;

        // armazena a extensão do arquivo em letras minúsculas na variável $imageFileType
        $imageFileType = strtolower(pathinfo($fileToUpload["name"],PATHINFO_EXTENSION));

        // cria um nome único para o arquivo a ser gravado no servidor
        do{
            $target_file = $target_dir . uniqid("img_",true) . ".$imageFileType";
            if (!file_exists($target_file)) { // verifica se ainda não existe arquivo com esse nome
                break;
            }
        } while(true);

        // Verifica se o arquivo contém mesmo uma imagem
        if(empty($fileToUpload["tmp_name"]) or 
        getimagesize($fileToUpload["tmp_name"]) === false) {
            echo "O arquivo não é uma imagem.<br>";
            $uploadOk = 0;
        }

        // Verifica o tamanho do arquivo
        if ($fileToUpload["size"] > 5e+6) {
            echo "Desculpe, seu arquivo é muito grande.<br>";
            $uploadOk = 0;
        }

        // Verifica os formatos de arquivo permitidos.
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.<br>";
            $uploadOk = 0;
        }

        // Tenta salvar o arquivo com a função move_uploaded_file
        if ($uploadOk != 0) {
            if (!move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
                echo "Desculpe, houve um erro durante o carregamento da imagem.<br>";
                $uploadOk = 0;
            }
        }

        // Retorna o caminho do arquivo se o upload foi feito corretamente.
        if ($uploadOk != 0) {
            return $target_file;
        }
        else{ // Retorna falso caso contrário.
            return false;
        }
    }



?>