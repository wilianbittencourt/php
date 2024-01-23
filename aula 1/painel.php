<?php

    session_start();

    if(isset($_SESSION['logar'])){
        echo "Logado com Sucesso";
    }else{
        echo "Não logou no sistema";
    }
