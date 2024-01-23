<?php

    class Fornecedor{

        private $fornecedor;
        private $pais;
        private $estado;
        private $cidade;
        
        

        /**
         * Get the value of fornecedor
         */
        public function getFornecedor()
        {
                return $this->fornecedor;
        }

        /**
         * Set the value of fornecedor
         */
        public function setFornecedor($fornecedor): self
        {
                $this->fornecedor = $fornecedor;

                return $this;
        }

        /**
         * Get the value of pais
         */
        public function getPais()
        {
                return $this->pais;
        }

        /**
         * Set the value of pais
         */
        public function setPais($pais): self
        {
                $this->pais = $pais;

                return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         */
        public function setEstado($estado): self
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of cidade
         */
        public function getCidade()
        {
                return $this->cidade;
        }

        /**
         * Set the value of cidade
         */
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
        public function  inserirFornecedor($dados) {
            try{
               
                $this->fornecedor = $dados['fornecedor'];
                $this->pais = $dados['pais'];
                $this->estado = $dados['estado'];
                $this->cidade = $dados['cidade'];

                if(empty(trim($this->fornecedor))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo fornecedor em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                }else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO fornecedor (fornecedor, pais, estado, cidade) VALUES(:fornecedor, :pais, :estado, :cidade)");
                    $cst->bindParam(":fornecedor" , $this->fornecedor, PDO::PARAM_STR);
                    $cst->bindParam(":pais" , $this->pais, PDO::PARAM_INT);
                    $cst->bindParam(":estado" , $this->estado, PDO::PARAM_INT);
                    $cst->bindParam(":cidade" , $this->cidade, PDO::PARAM_INT);

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
        public function  selecionarFornecedor() {
            try{
                $cst = $this->con->conectar()->prepare(
                "SELECT DISTINCT i.id, p.pais, b.estado, c.cidade, i.fornecedor

                FROM fornecedor i
               
                join pais p on p.id = i.pais
                join estado b on b.id = i.estado
                join cidade c on c.id = i.cidade
               
                GROUP BY i.id"
                );
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }

        //Editar no Banco de dados
        public function  editarFornecedor() {

        }

         //Deletar  no Banco de dados
        public function  deletarFornecedor() {
            try{

            }
            catch(PDOException $ex){
                echo $ex;
            }
        }
    }

?>