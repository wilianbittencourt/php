<style>
  .dropdown-item{
    color:blue;
    border: 1px blue solid;
  }
  .dropdown-menu{
    border: none;
  }
  .dropdown-item:hover{
    color:red;
    background-color: transparent;
  }
  a{
    color:blue;
  }
  a:hover{
    color:red;
  }

</style>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="../View/home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../View/cliente.php">Clientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../View/fornecedor.php">Fornecedor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../View/produto.php">Produto</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Endereços</a>
    <div class="dropdown-menu">
      <a class="dropdown-item rounded" href="../View/pais.php">País</a>
      <a class="dropdown-item rounded mt-1" href="../View/estado.php">Estado</a>
      <a class="dropdown-item rounded mt-1" href="../View/cidade.php">Cidade</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Outros</a>
    <div class="dropdown-menu">
      <a class="dropdown-item rounded" href="../View/usuario.php">Usuario</a>
      <a class="dropdown-item rounded mt-1" href="../View/categoria.php">Categoria</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Sair</a>
  </li>
</ul>