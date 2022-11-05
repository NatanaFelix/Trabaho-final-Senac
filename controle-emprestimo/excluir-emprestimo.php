<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/emprestimo.css">
    <title>Excluir Empréstimo</title>
</head>
<body>
    <?php
include_once '../controle-principal/conexao.php';
include_once '../assets/navbar-principal.php';
include_once '../controle-principal/funcoes.php';

$codigoEmprestimo = $_GET['codEmprestimo'];
$sql = "DELETE FROM emprestimolivros WHERE codEmprestimo = '$codigoEmprestimo'";

if($dados = mysqli_query($conexao,$sql)){
    echo "<div class='class-alet alert-success' role='alert'>O empréstimo foi excluído com sucesso!</div>";
    echo "<a href='./emprestimo.php' class='btn btn-outline-secondary'>Voltar</a>";    
}

include_once '../controle-principal/bootjs.php';

?>
</body>
</html>