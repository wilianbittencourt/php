<?php
    Class Tigrao extends Pessoa{

        public $tamanho = 7.42;


        public function imprimeTamanho(){
            echo $this->nome . " ". $this->tamanho;
        }
    }

?>