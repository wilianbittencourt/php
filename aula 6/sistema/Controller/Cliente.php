<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Cliente {
        
        private $cliente;
        private $endereco;
        private $pais;
        private $estado;
        private $cidade;
 
       


        /**
         * Get the value of cliente
         */
        public function getCliente()
        {
                return $this->cliente;
        }

        /**
         * Set the value of cliente
         */
        public function setCliente($cliente): self
        {
                $this->cliente = $cliente;

                return $this;
        }

        /**
         * Get the value of endereco
         */
        public function getEndereco()
        {
                return $this->endereco;
        }

        /**
         * Set the value of endereco
         */
        public function setEndereco($endereco): self
        {
                $this->endereco = $endereco;

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

        public function imprimeCliente(){
            echo "Teste de Cliente com Conexa com o Banco de Dados";
        }

        //Gravar no Banco de dados
        public function  inserirCliente($dados) {
            try{
               
                $this->cliente = $dados['cliente'];
                $this->endereco = $dados['endereco'];
                $this->pais = $dados['pais'];
                $this->estado = $dados['estado'];
                $this->cidade = $dados['cidade'];

                if(empty(trim($this->cliente))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo cliente em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                }else if(empty(trim($this->cliente))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo endereço em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO cliente (cliente, endereco, pais, estado, cidade) VALUES(:cliente, :endereco, :pais, :estado, :cidade)");
                    $cst->bindParam(":cliente" , $this->cliente, PDO::PARAM_STR);
                    $cst->bindParam(":endereco" , $this->endereco, PDO::PARAM_STR);
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
        public function  selecionarCliente() {
            try{
                $cst = $this->con->conectar()->prepare(
                "SELECT DISTINCT i.id, p.pais, b.estado, c.cidade, i.cliente, i.endereco

                FROM cliente i
               
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
        public function  editarCliente() {

        }

         //Deletar  no Banco de dados
        public function  deletarCliente() {
            try{

            }
            catch(PDOException $ex){
                echo $ex;
            }
        }
    }