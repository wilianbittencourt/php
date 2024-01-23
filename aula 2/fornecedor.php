<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Painel PHP</title>
  </head>
  <body>

    <div class="container">

        <?php 
            include "menu/menu.php";
        ?>

        <?php

        session_start();

        if(isset($_SESSION['logar'])){
            echo "Cadastro fornecedor";
        
        ?>
          <form method="post" action="acoes/cadfornecedor.php" style="margin-top: 20px;">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome do fornecedor">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">CNPJ</label>
                <input type="text" name="cnpj" class="form-control" placeholder="CNPJ">
              </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Telefone</label>
              <input type="text" name="telefone" class="form-control"  placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress">Endereço</label>
              <input type="text" name="endereco" class="form-control"  placeholder="">
            </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Cidade</label>
                <input type="text" name="cidade" class="form-control" >
              </div>
              <div class="form-group col-md-4">
                <label for="inputEstado">Estado</label>
                <select name="estado" class="form-control">
                  <option selected>Escolher...</option>
                  <option>RS</option>
                  <option>SC</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputCEP">CEP</label>
                <input type="number" name="cep" class="form-control">
              </div>
            </div>
            <input type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar">
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