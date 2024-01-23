<?php
    require "Pessoa.php";
    require "Romulo.php";
    require "Tigrao.php";

    $pessoa = new Pessoa();

    $a  = new Romulo();
    $t  = new Tigrao();

    $pessoa->imprimirPessoa(); 
    $a->imprimirTime();
    $t->imprimeTamanho();
?>