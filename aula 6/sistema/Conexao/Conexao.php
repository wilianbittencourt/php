<?php
    class Conexao{

        private $usuario;
        private $senha;
        private $banco;
        private $servidor;
        private static $pdo;

        //Método Construtor
        public function __construct(){
            
            $this->servidor = "localhost";
            $this->usuario = "root";
            $this->senha = "";
            $this->banco = "sistema";
        }

        //Método para Conecetar com o Banco de Dados
        public function conectar(){
            try{
                 if(is_null (self::$pdo)){

                    self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco , $this->usuario , $this->senha);
                } 
                
                return self::$pdo;    

            }catch(PDOException $ex){
                echo $ex;
            }
        }


    }