<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Usuario {
        
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $tipo;
        private $mensagem;

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

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
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of senha
         */
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         */
        public function setSenha($senha): self
        {
                $this->senha = $senha;

                return $this;
        }

        /**
         * Get the value of tipo
         */
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         */
        public function setTipo($tipo): self
        {
                $this->tipo = $tipo;

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
            $this->objfn = new Funcoes();
        }

        //Gravar no Banco de dados
        public function inserirUsuario($dados) {
            try{
                $this->nome = $dados['nome'];
                $this->email = $dados['email'];
                $this->senha = sha1($dados['senha']);
                $this->tipo = $dados['tipo'];
                $this->mensagem = trim($dados['mensagem']);

                if(empty(trim($this->nome))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo nome em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else if(empty(trim($this->email))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Email em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else if(empty(trim($this->senha))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Senha em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else if(empty(trim($this->tipo))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Tipo em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                }else if(empty(trim($this->mensagem))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Mensagem em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO usuario (nome,email,senha,tipo,mensagem) VALUES(:nome, :email,:senha,:tipo,:mensagem)");
                    $cst->bindParam(":nome" , $this->nome, PDO::PARAM_STR);
                    $cst->bindParam(":email" , $this->email, PDO::PARAM_STR);
                    $cst->bindParam(":senha" , $this->senha, PDO::PARAM_STR);
                    $cst->bindParam(":tipo" , $this->tipo, PDO::PARAM_STR);
                    $cst->bindParam(":mensagem" , $this->mensagem, PDO::PARAM_STR);

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

        //Editar no Banco de dados
        public function  editarUsuario($dados) {
            try{

                $this->id = $this->objfn->base64($dados['func'],2);
                $this->nome = $dados['nome'];
                $this->email = $dados['email'];
                $this->senha = sha1($dados['senha']);
                $this->tipo = $dados['tipo'];
                $this->mensagem = trim($dados['mensagem']);

                $cst = $this->con->conectar()->prepare("UPDATE usuario SET nome = :nome ,email = :email ,senha = :senha, tipo =  :tipo, mensagem = :mensagem WHERE id = :idUser");
                $cst->bindParam(":idUser" , $this->id, PDO::PARAM_INT);
                $cst->bindParam(":nome" , $this->nome, PDO::PARAM_STR);
                $cst->bindParam(":email" , $this->email, PDO::PARAM_STR);
                $cst->bindParam(":senha" , $this->senha, PDO::PARAM_STR);
                $cst->bindParam(":tipo" , $this->tipo, PDO::PARAM_STR);
                $cst->bindParam(":mensagem" , $this->mensagem, PDO::PARAM_STR);

                if($cst->execute()){
                    return 'ok';
                } else{
                    echo 'Não';
                }
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

         //Deletar no Banco de dados
        public function  deletarUsuario($dados) {
        try{
            $this->id = $this->objfn->base64($dados, 2);

            $cst = $this->con->conectar()->prepare("DELETE FROM usuario WHERE id= :idUser");
            $cst->bindParam(":idUser" , $this->id, PDO::PARAM_INT);
                if($cst->execute()){
                    return "ok";
                } else{
                    return "Não deu";
                }
            }catch(PDOException $ex){
                echo $ex;
            }
        }

        //Selecionar  no Banco de dados
        public function  selecionarUsuario() {
            try{
                $cst = $this->con->conectar()->prepare("SELECT * FROM usuario");
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }

        //Seleciona ID do Usuário
        public function selecionaIdentificador($dados) {
            try{
                $this->id = $this->objfn->base64($dados, 2);
                $cst = $this->con->conectar()->prepare("SELECT id, nome, email, senha, tipo ,mensagem FROM usuario WHERE id = :idUser ");
                $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);

                if($cst->rowCount() == 0){
                    echo "Sem usuario na tabela";
                }else{
                    $cst->execute();
                    return $cst->fetch();
                }
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

        //Método para verificar usuario logar
        public function verificaUsuario($dados) {

            try{
                
                $cst = $this->con->conectar()->prepare("SELECT id, email, senha, nome, tipo FROM usuario WHERE id=:id");
                $cst->bindParam(":id", $this->id, PDO::PARAM_INT);

                    $cst->execute();
                    $rst = $cst->fetch();


                    //$_SESSION['nome'] = $rst['nome'];

            }
            catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        //Logar Usuário
        public function logarUsuario($dados)
        {
            $this->email = $dados["email"];
            $this->senha = sha1($dados["senha"]);
   
            try
            {
                $cst = $this->con->conectar()->prepare("SELECT id,email,senha FROM usuario WHERE email = :email AND senha = :senha");
                $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
   
                $cst->execute();
   
                if($cst->rowCount() == 0)
                {
                    echo 
                    '<html>
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <strong> Usuario não encontrado, verifique os dados e tente novamente. </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    </html>';
                }
                else
                {
                    session_start();
                    $rst = $cst->fetch();
                    $_SESSION['logado'] = 'logar';
                    $_SESSION['func'] =  $rst['id'];
                    header("Location:../View/home.php");
                }
   
   
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
            }
   
        }

    }