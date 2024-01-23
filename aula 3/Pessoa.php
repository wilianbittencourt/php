<?php
class Pessoa{

    private $nome;
    private $sobrenome;

    

    /**
     * Get the value of nome
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Get the value of sobrenome
     */
    public function getSobrenome() {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     */
    public function setSobrenome($sobrenome): self {
        $this->sobrenome = $sobrenome;
        return $this;
    }
}

?>