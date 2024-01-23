<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>

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
            echo "Cadastro produto:";
        
        ?>
          <form method="post" action="acoes/cadproduto.php" enctype="multipart/form-data" style="margin-top: 20px;">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Categoria</label>
                <select type="text" name="categoria" class="form-control">
                <option selected>Escolher...</option>
                  <option>Comida</option>
                  <option>Acessorio</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">código</label>
                <input type="text" name="codigo" class="form-control" placeholder="código do produto">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="inputAddress">Nome</label>
              <input type="text" name="nome" class="form-control"  placeholder="nome do produto">
              </div>
              <div class="form-group col-md-4">
                <label for="inputEstado">Fornecedor</label>
                <select name="fornecedor" class="form-control">
                  <option selected>Escolher...</option>
                  <option>Jão</option>
                  <option>Predu</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputCEP">Quantidade</label>
                <input type="number" name="quantidade" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Enviar Imagem</label>
              <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group" >
              <label for="exampleFormControlTextarea1">Descrição do produto</label>
              <textarea class="form-control " style="max-width: 100%;" id="area2" name="area2" rows="3"></textarea>
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

    <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>