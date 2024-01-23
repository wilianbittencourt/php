<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once('envia-email/PHPMailer/class.phpmailer.php');

    $mail = new PHPMailer;

    try {
        // Função para validar o formato do e-mail
        function validarEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];

        if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
            echo 'Por favor, preencha todos os campos.';
        } elseif (!validarEmail($email)) {
            echo 'Por favor, insira um endereço de e-mail válido.';
        } else {
            // Configurações do servidor SMTP
            $mail->SetLanguage("br");
            $mail->IsSMTP(); // Habilita o SMTP 
            $mail->SMTPAuth = true; // Ativa e-mail autenticado
            $mail->Host = 'mail.florestasenegocios.com.br'; // Servidor de envio (verifique com sua hospedagem)
            $mail->Port = '587'; // Porta de envio (verifique com sua hospedagem)
            $mail->Username = 'contato@florestasenegocios.com.br'; // E-mail que será autenticado
            $mail->Password = 'paulocontato123@A'; // Senha do e-mail (substitua pela sua senha)
            // Ativa o envio de e-mails em HTML, se false, desativa.
            $mail->IsHTML(true);
            $mail->SMTPSecure = "sll"; // tls ou ssl

            // Remetente e destinatário
            $mail->setFrom('contato@florestasenegocios.com.br', 'Remetente');
            $mail->addAddress($email); // Usar o endereço de e-mail do formulário como destinatário

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = 'Nome: ' . $nome . '<br>Assunto: ' . $assunto . '<br>Mensagem: ' . $mensagem;

            if ($mail->send()) {
                echo 'E-mail enviado com sucesso para ' . $email;
                header("Location:mailer.php"); // Redireciona para a página "teste.php"
                unset($_POST); // Limpa os dados do formulário
            } else {
                echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
                unset($_POST); // Limpa os dados do formulário
            }
        }
    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
        unset($_POST); // Limpa os dados do formulário
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Envio de E-mail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <?php 
            include "menu/menu.php";
        ?>

        <?php

        session_start();

        if(isset($_SESSION['logar'])){
            echo "Envio email PHPMAILER:";

        ?>

        <form method="post" action="" autocomplete="off"  style="margin-top: 40px;">
            <!-- Campos do formulário com IDs -->
            <input class="form-control" type="text" name="nome" placeholder="Nome"><br>
            <input class="form-control" type="text" name="email" placeholder="E-mail"><br>
            <input class="form-control" type="text" name="assunto" placeholder="Assunto"><br>
            <textarea class="form-control" name="mensagem" placeholder="Mensagem"></textarea><br>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        }else{
            echo "Não logou no sistema";
            header("Location:index.html");
        }
        ?>

        <?php 
            include "menu/rodape.php";
        ?>

    </div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>