<?php
function return_dados($dado){
    include "conecta_mysql.php";

    $nick = $_SESSION["nickname"];
    $nick = htmlspecialchars($nick);

    $sql ="SELECT * FROM usuarios WHERE nickname LIKE '$nick';"; 
    $resposta = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($resposta);

    if($dado == "nickname"){
        return $usuario["nickname"];
    }
    elseif($dado == "nome"){
        return $usuario["nome"];
    }
    elseif($dado == "email"){
        return $usuario["email"];
    }
    elseif($dado == "datanasc"){
        return $usuario["datanasc"];
    }
    elseif($dado == "adm"){
        return $usuario["adm"];
    }
}
?>