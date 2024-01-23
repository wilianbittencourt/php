<?php

session_start();

if(isset($_POST['enviar'])){

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    if($usuario == "senac" && $senha == "123"){
        $_SESSION['logar'] = TRUE;
        header("Location:painel.php");
    
    }else{
        echo "logar novamente";
        header("Location:index.html");
    }
    
}else{
    echo "Não clicou no botão de enviar";
}