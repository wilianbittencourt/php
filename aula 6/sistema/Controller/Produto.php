<?php

    class Produto{

        private $nome;
        private $preco;
        private $categoria;
        private $foto;
        private $foto_tipo;
        private $foto_tamanho;
        private $mensagem;
        
        

        /**
         * Get the value of nome
         */
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome($nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of preco
         */
        public function getPreco()
        {
                return $this->preco;
        }

        /**
         * Set the value of preco
         */
        public function setPreco($preco): self
        {
                $this->preco = $preco;

                return $this;
        }

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

        /**
         * Get the value of foto
         */
        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Set the value of foto
         */
        public function setFoto($foto): self
        {
                $this->foto = $foto;

                return $this;
        }

        /**
         * Get the value of foto_tipo
         */
        public function getFotoTipo()
        {
                return $this->foto_tipo;
        }

        /**
         * Set the value of foto_tipo
         */
        public function setFotoTipo($foto_tipo): self
        {
                $this->foto_tipo = $foto_tipo;

                return $this;
        }

        /**
         * Get the value of foto_tamanho
         */
        public function getFotoTamanho()
        {
                return $this->foto_tamanho;
        }

        /**
         * Set the value of foto_tamanho
         */
        public function setFotoTamanho($foto_tamanho): self
        {
                $this->foto_tamanho = $foto_tamanho;

                return $this;
        }

        /**
         * Get the value of mensagem
         */
        public function getMensagem()
        {
                return $this->mensagem;
        }

        /**
         * Set the value of mensagem
         */
        public function setMensagem($mensagem): self
        {
                $this->mensagem = $mensagem;

                return $this;
        }

                //Instanciar a Classe de Conexao com o Banco de dados
        public function __construct(){
            $this->con = new Conexao();
        }

        //Gravar no Banco de dados
        public function  inserirProduto($dados) {
            try{
               
                $this->nome = $dados['nome'];
                $this->preco = $dados['preco'];
                $this->categoria = $dados['categoria'];
                $this->mensagem = $dados['mensagem'];

                //upload de arquivo
                $md5 = md5(time());
                $this->foto = $md5.$_FILES['foto']['name'];
                $this->foto_tamanho = $_FILES['foto']['size'];
                $this->foto_tipo = $_FILES['foto']['type'];

                $caminho = __DIR__ . "/imagem/";

                //if(empty(trim($this->nome))  ){
                 //   echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo nome em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
               // }else if(empty(trim($this->categoria))){
               //     echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo categoria em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
              //  }else if(empty(trim($this->preco))){
               //     echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo preço em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
              //}else
              if(strpos($this->foto_tipo, 'png') || strpos($this->foto_tipo, 'jpg') || strpos($this->foto_tipo, 'jpeg') && $this->foto_tamanho < 1000000 ){

                    move_uploaded_file($_FILES['foto']['tmp_name'] , $caminho . $this->foto);
                    
                    $cst = $this->con->conectar()->prepare("INSERT INTO produto (nome, preco, categoria, foto, mensagem) VALUES(:nome, :preco, :categoria, :foto, :mensagem)");
                    $cst->bindParam(":nome" , $this->nome, PDO::PARAM_STR);
                    $cst->bindParam(":preco" , $this->preco, PDO::PARAM_STR);
                    $cst->bindParam(":categoria" , $this->categoria, PDO::PARAM_STR);
                    $cst->bindParam(":foto" , $this->foto, PDO::PARAM_STR);
                    $cst->bindParam(":mensagem" , $this->mensagem, PDO::PARAM_STR);

                    if($cst->execute()){
                        return 'ok';
                    } else{
                        echo 'Não';
                    }

                }else{
                    echo "<script> alert('Verifique se selecionou uma imagem ou se a imagem é PGN, JPG ou JPEG e se é menor que 1MB'); location.replace(' produto.php'); </script>";
                }
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

        //Selecionar do Banco de dados
        public function  selecionarProduto() {
            try{
                $cst = $this->con->conectar()->prepare(
                "SELECT DISTINCT i.id, c.categoria, i.nome, i.preco, i.foto, i.mensagem

                FROM produto i
               
                join categoria c on c.id = i.categoria
               
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