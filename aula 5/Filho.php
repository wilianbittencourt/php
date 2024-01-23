<?php
    class Filho extends Pessoa{
        private $cpf = "4343423432";
        

        /**
         * Get the value of cpf
         */
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         */
        public function setCpf($cpf): self
        {
                $this->cpf = $cpf;

                return $this;
        }

        function imprimeFilho(){
            echo $this->cpf . " " . $this->getNome() . " " . $this->getIdade() . " " . $this->getAltura();
        }

        
    }
?>