<?php

if(isset($_POST['enviar'])){
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    
    if(empty(trim($email))){
        echo "<script> alert('Campo email em branco'); location.replace('../email.php'); </script>";
    }else if(empty(trim($assunto))){
        echo "<script> alert('Campo assunto em branco'); location.replace('../email.php'); </script>";
    }else if(trim(strlen($mensagem) == 4)){
        echo "<script> alert('Campo mensagem em branco'); location.replace('../email.php'); </script>";
    }else{
        mail($email, $assunto, $mensagem);
        echo "Enviado com sucesso!";
    }
}