<?php
    class Romulo extends Pessoa{
        
        public $time = "flamengo";
        
        public function imprimirTime(){
            echo $this->nome . " " . $this->time . " " . $this->idade;
        }
    }

?>