<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Estado {
       
        private $estado;

        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado): self
        {
                $this->estado = $estado;

                return $this;
        }
       

        //Instanciar a Classe de Conexao com o Banco de dados
        public function __construct(){
            $this->con = new Conexao();
        }


        //Gravar no Banco de dados
        public function  inserirEstado($dados) {
            try{
               
                $this->estado = $dados['estado'];

                if(empty(trim($this->estado))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo País em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO estado (estado) VALUES(:estado)");
                    $cst->bindParam(":estado" , $this->estado, PDO::PARAM_STR);

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
        public function  selecionarEstado() {
            try{
                $cst = $this->con->conectar()->prepare("SELECT * FROM estado");
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }



    }