<?php
    class Pessoa{
        public $nome = "Senac";
        public $sobrenome = "Centro";
        public $idade = "20";

        public function imprimirPessoa(){
            echo $this->nome ." ". $this->sobrenome ." ". $this->idade;
        }
        
    }
?>