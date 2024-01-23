<?php
    class Filho extends Pessoa{
        private $escola = "Senac Caxias";

        

        /**
         * Get the value of escola
         */
        public function getEscola()
        {
                return $this->escola;
        }

        /**
         * Set the value of escola
         */
        public function setEscola($escola): self
        {
                $this->escola = $escola;

                return $this;
        }

        public function imprimeFilho(){
          echo $this->getNome() ." ". $this->escola;
        }
    }
?>