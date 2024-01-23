<?php

    class Usuario{
        //atributos da classe Usuario

        public $usuario = "senac";
        public $senha = "123";
        public $email = "@email";
        public $nivel = "admin";
        public $cpf = "8286392444";

        //criar um metodo (função) para imprimir
        public function imprimeAtributos(){
            echo $this->usuario . $this->senha;
        }
    }

?>