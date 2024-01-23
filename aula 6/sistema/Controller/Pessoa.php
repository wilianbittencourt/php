<?php
    class Pessoa {

        private $nome = "Composer";

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

        function testeComposer(){
            echo $this->nome;
        }
    }