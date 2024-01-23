<?php

    require "Teste.php";
    require "Usuario.php";

    //Criar objeto da classe Teste.php

    $a = new Teste();
    $b = new Usuario();

    echo $a->nome . $a->idade . $a->telefone . "<br>";
    echo $b->usuario . $b->senha . $b->email . $b->nivel . $b->cpf . "<br>";
    $teste = $b->imprimeAtributos();
    echo $teste;
?>