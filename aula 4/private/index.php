<?php
    require "Pessoa.php";
    require "Filho.php";

    $p = new Pessoa();
    $p->imprimePrivate();

    $f = new Filho();
    $f->imprimeFilho();

?>