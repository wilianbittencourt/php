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

            $usuario = new Usuario();
            $conexao = new Conexao();
            $objfn = new Funcoes();

          if(isset($_POST['enviar'])){

            if($usuario->inserirUsuario($_POST) == "ok" ){
              echo "<html> <div class='alert alert-primary alert-dismissible fade show' role='alert'> Cadastrado com Sucesso <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";
            }
          }
          if(isset($_POST['editar'])){

            if($usuario->editarUsuario($_POST) == "ok" ){
             echo header("location:usuario.php");
              // echo header("Location: ?acao=edit?func" . $objfn->base64($_POST['func'], 1)  );
            }
          }

          if(isset($_GET['acao'])){

             switch($_GET['acao']){

                case "edit":  $func = $usuario->selecionaIdentificador($_GET['func']);
                  break;
                case "delet": 
                    if( $usuario->deletarUsuario($_GET['func']) == "ok"){
                        echo "Deletado com Sucesso";
                        header("location:usuario.php");
                    } else{
                      echo "Não Deletou";
                    }
                  break;

             } 
          }

          
          ?>

        <h1>Cadastro Usuário</h1>
       <form method="post" action="">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Usuário:</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?=(isset($func["nome"]) ?  ($func["nome"]) : ("") )   ?>" placeholder="Nome do Usuário">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email do Usuário:</label>
            <input type="text" name="email" class="form-control" value="<?=  (isset($func["email"]) ?  ($func["email"]) : ("")  )   ?>"  placeholder="Email do Usuário">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Senha do Usuário:</label>
            <input type="password" name="senha" class="form-control" value="<?=  (isset($func["senha"]) ? ($func["senha"]) : ("")  )   ?>"  placeholder="Senha do Usuário">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nível do Usuário:</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="padrao">Usuário Padrão</option>
                <option value="admin">Usuário Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mensagem:</label>
            <textarea class="form-control" name="mensagem"  rows="3">   <?php echo (isset($func["mensagem"]) ? ($func["mensagem"]) : ("")  ); ?> </textarea>
        </div>

        <input type="submit" class="btn btn-primary" name="<?= (isset($_GET["acao"]) == "edit" ? ("editar") : ("enviar") )  ?>" value="<?= (isset($_GET["acao"]) == "edit" ? ("Alterar") : ("Cadastrar") )  ?>">
        <input type="hidden" name="func" value="<?=  (isset($func["id"]) ? $objfn->base64($func["id"], 1) : " " )  ?>">

        </form>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Senha</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Observação</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Deletar</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                  $usuario->selecionarUsuario();

                  foreach($usuario->selecionarUsuario() as $resultado){
                  ?>
                        <tr>
                          <th scope="row"> <?php echo $resultado['id']; ?>  </th>
                          <td> <?php echo $resultado['nome']; ?> </td>
                          <td><?php echo $resultado['email'] ?></td>
                          <td><?php echo $resultado['senha'] ?></td>
                          <td><?php echo $resultado['tipo'] ?></td>
                          <td><?php echo $resultado['mensagem'] ?></td>
                          <td><a class="btn btn-info" href="?acao=edit&func=<?= $objfn->base64($resultado["id"], 1) ?>">Editar</a></td>
                          <td><a class="btn btn-danger" href="?acao=delet&func=<?= $objfn->base64($resultado["id"], 1) ?>">Deletar</a></td>
                        </tr>
                
                <?php   } ?>
 
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