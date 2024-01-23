<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Pais {
       
        private $pais;

        public function getPais()
        {
                return $this->pais;
        }

        public function setPais($pais): self
        {
                $this->pais = $pais;

                return $this;
        }
       

        //Instanciar a Classe de Conexao com o Banco de dados
        public function __construct(){
            $this->con = new Conexao();
        }


        //Gravar no Banco de dados
        public function  inserirPais($dados) {
            try{
               
                $this->pais = $dados['pais'];

                if(empty(trim($this->pais))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo País em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO pais (pais) VALUES(:pais)");
                    $cst->bindParam(":pais" , $this->pais, PDO::PARAM_STR);

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
        public function  selecionarPais() {
            try{
                $cst = $this->con->conectar()->prepare("SELECT * FROM pais");
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }



    }