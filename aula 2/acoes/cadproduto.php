<?php

    if(isset($_POST['cadastrar'])){
        $categoria = $_POST['categoria'];
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $fornecedor = $_POST['fornecedor'];
        $quantidade = $_POST['quantidade'];
        $area2 = $_POST['area2'];
        //cadastro de arquivo
        $foto = $_FILES['foto']['name'];
        $foto_tamanho = $_FILES['foto']['size'];
        $foto_tipo = $_FILES['foto']['type'];
        $caminho = "imagem/";
        $md5 = md5(time());
        

        if(empty(trim($categoria)) || $categoria == 'Escolher...'){
            echo "<script> alert('Campo Categoria em branco'); location.replace('../produto.php'); </script>";
        }else if(empty(trim($codigo))){
            echo "<script> alert('Campo codigo em branco'); location.replace('../produto.php'); </script>";
        }else if(empty(trim($nome))){
            echo "<script> alert('Campo nome em branco'); location.replace('../produto.php'); </script>";
        }else if(empty(trim($fornecedor)) || $fornecedor == 'Escolher...'){
            echo "<script> alert('Campo fornecedor em branco'); location.replace('../produto.php'); </script>";
        }else if(empty(trim($quantidade))){
            echo "<script> alert('Campo quantidade em branco'); location.replace('../produto.php'); </script>";
        }else if(trim(strlen($area2) == 4)){
            echo "<script> alert('Campo textarea em branco'); location.replace('../produto.php'); </script>";
        }else if($foto == ''){
            echo $categoria . " " . $codigo . " " . $nome . " " . $fornecedor . " " . $quantidade . " " . $area2 .  "<br>"; 
        }else if(strpos($foto_tipo, 'png') || strpos($foto_tipo, 'jpg') || strpos($foto_tipo, 'jpeg') && $foto_tamanho < 1000000 ){
            //função para envio de arquivos
            move_uploaded_file($_FILES['foto']['tmp_name'] , $caminho . $md5 . $_FILES['foto']['name']);
            echo $categoria . " " . $codigo . " " . $nome . " " . $fornecedor . " " . $quantidade . " " . $area2 .  "<br>"; 
            echo "<img width='100' src='imagem/" . $md5 . $_FILES['foto']['name'] . " ' /> ";
        }else{
            echo "<script> alert('Verifique se selecionou uma imagem ou se a imagem é PGN, JPG ou JPEG e se é menor que 1MB'); location.replace('../produto.php'); </script>";
        }

        
    }