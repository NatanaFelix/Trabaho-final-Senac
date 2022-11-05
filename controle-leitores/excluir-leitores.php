<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/leitores.css">
    <title>Excluir Leitor</title>
</head>
<body>
    <?php
        include_once '../controle-principal/conexao.php';
        include_once '../assets/navbar-principal.php';
        include_once '../controle-principal/funcoes.php';

        $chave = $_GET['CPF'];
        $sql = "DELETE FROM leitores WHERE CPF = '$chave'";

        if($dados = mysqli_query($conexao,$sql)){
            echo "<div class='alert alert-success' role='alert'>O leitor foi excluido com sucesso!</div>";
            echo "<a href='./leitores.php' class='btn btn-outline-secondary'>Voltar</a>";    
        }else{
            echo "<div class='alert alert-success' role='alert'>Ocorreu um problema!</div>";
        }

        include_once '../controle-principal/bootjs.php';
    ?>
</body>
</html>