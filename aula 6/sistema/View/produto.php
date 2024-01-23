<!DOCTYPE html>
<html lang="pt-br">  
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Olá, mundo!</title>
  </head>
  <body>
    <div class="container">
        <?php include "../includes/menu.php"; ?>

        <?php
          require_once "../vendor/autoload.php";
          
          $produto = new Produto();
          $categoria = new Categoria();
          $conexao = new Conexao();

          if(isset($_POST['enviar'])){
            if($produto->inserirProduto($_POST) == "ok"){
              header('Location: produto.php'); // Redireciona para uma nova URL após o envio do formulário
              exit; // Termina a execução do script após o redirecionamento
            }
          }

        ?>
          <h1>Cadastro Produto</h1>
          <form method="post" action="" autocomplete="off" enctype="multipart/form-data" style="margin-top: 20px;">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputAddress">Nome</label>
                <input type="text" name="nome" class="form-control"  placeholder="Nome do produto">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="inputEmail4">Categoria</label>
                <select type="text" name="categoria" class="form-control">

                <?php $categoria->selecionarCategoria();

                  foreach($categoria->selecionarCategoria() as $resultado){
                    ?> 

                      <option value="<?php echo $resultado['id'] ?>"> <?php echo $resultado['categoria'] ?> </option>

                        <?php 
                        }
                    ?>

                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputAddress">Preço</label>
                <input type="number" name="preco" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Enviar Imagem</label>
              <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group" >
              <label for="exampleFormControlTextarea1">Descrição do produto</label>
              <textarea class="form-control " style="max-width: 100%;" id="mensagem" name="mensagem" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" name="enviar" value="Cadastrar">
          </form>

          <table style="margin-top: 30px;" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Foto</th>
                <th scope="col">Mensagem</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
              </tr>
            </thead>

            <tbody>
            <?php
              $contagem = 1;
              foreach($produto->selecionarProduto() as $resultado){
            ?>

              <tr>
                <th scope="row"> <?php echo $contagem++; ?> </th>
                <td> <?php echo $resultado['nome']; ?> </td>
                <td> <?php echo $resultado['preco']; ?> </td>
                <td> <?php echo $resultado['categoria']; ?> </td>
                <td> <?php echo "<img width='100' src='../controller/imagem/" . $resultado['foto'] ." '; "?> </td>
                <td> <?php echo $resultado['mensagem']; ?> </td>
                <td><button type="button" class="btn btn-warning" onclick="">Editar</button></td>
                <td><input type="submit" value="deletar" name="deletar" class="btn btn-danger"></td>
              </tr>

            <?php } ?>
            
          </tbody>
          </table>

            <?php include "../includes/rodape.php"; ?>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>