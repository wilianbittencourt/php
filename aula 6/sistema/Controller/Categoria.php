<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Categoria {
       
        private $categoria;

        /**
         * Get the value of categoria
         */
        public function getCategoria()
        {
                return $this->categoria;
        }

        /**
         * Set the value of categoria
         */
        public function setCategoria($categoria): self
        {
                $this->categoria = $categoria;

                return $this;
        }

        //Instanciar a Classe de Conexao com o Banco de dados
        public function __construct(){
            $this->con = new Conexao();
        }


        //Gravar no Banco de dados
        public function  inserirCategoria($dados) {
            try{
               
                $this->categoria = $dados['categoria'];

                if(empty(trim($this->categoria))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Categoria em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO categoria (categoria) VALUES(:categoria)");
                    $cst->bindParam(":categoria" , $this->categoria, PDO::PARAM_STR);

                    if($cst->execute()){
                        return 'ok';
                    } else{
                        echo 'Não';
                    }
                }
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }


        //Selecionar do Banco de dados
        public function  selecionarCategoria() {
            try{
                $cst = $this->con->conectar()->prepare("SELECT * FROM categoria");
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }
    }