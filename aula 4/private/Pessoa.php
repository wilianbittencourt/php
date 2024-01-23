<?php
    class Pessoa{
        private $nome = "Senac";
        private $sobrenome = "Centro";
        private $numero = 542;

        //gerar getter e setter
        

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
         * Get the value of sobrenome
         */
        public function getSobrenome()
        {
                return $this->sobrenome;
        }

        /**
         * Set the value of sobrenome
         */
        public function setSobrenome($sobrenome): self
        {
                $this->sobrenome = $sobrenome;

                return $this;
        }

        /**
         * Get the value of numero
         */
        public function getNumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         */
        public function setNumero($numero): self
        {
                $this->numero = $numero;

                return $this;
        }


        //Metodo para imprimir atributos

        public function imprimePrivate(){
            echo $this->nome;
        }
    }
?>