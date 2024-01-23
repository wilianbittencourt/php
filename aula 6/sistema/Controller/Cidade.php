<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Cidade {
       
        private $cidade;

        public function getCidade()
        {
                return $this->pais;
        }

        public function setCidade($cidade): self
        {
                $this->cidade = $cidade;

                return $this;
        }
       

        //Instanciar a Classe de Conexao com o Banco de dados
        public function __construct(){
            $this->con = new Conexao();
        }


        //Gravar no Banco de dados
        public function  inserirCidade($dados) {
            try{
               
                $this->cidade = $dados['cidade'];

                if(empty(trim($this->cidade))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo País em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO cidade (cidade) VALUES(:cidade)");
                    $cst->bindParam(":cidade" , $this->cidade, PDO::PARAM_STR);

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
        public function  selecionarCidade() {
            try{
                $cst = $this->con->conectar()->prepare("SELECT * FROM cidade");
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }



    }