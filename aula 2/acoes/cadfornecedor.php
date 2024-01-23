<?php

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        if(empty(trim($nome))){
            echo "Campo nome em branco";
        }else if(empty(trim($cnpj))){
            echo "Campo CNPJ em branco";
        }else if(empty(trim($telefone))){
            echo "Campo Telefone em branco";
        }else if(empty(trim($endereco))){
            echo "Campo endereço em branco";
        }else if(empty(trim($cidade))){
            echo "Campo cidade em branco";
        }else if(empty(trim($estado)) || $estado == 'Escolher...'){
            echo "Campo estado em branco";
        }else if(empty(trim($cep))){
            echo "Campo CEP em branco";
        }else{
            echo $nome . " " . $telefone . " " . $endereco . " " . $cidade . " " . $estado . " " . $cep;
        }
    }